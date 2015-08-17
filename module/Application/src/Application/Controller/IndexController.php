<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Zend\Paginator\Paginator;

class IndexController extends AbstractActionController {

    private $entityManager;
    private $controllerName;
    private $entityName;

    /**
     * 
     * @param \Zend\Mvc\MvcEvent $e
     * @return type
     */
    public function onDispatch(MvcEvent $e) {

        $this->entityManager = $this
                ->getServiceLocator()
                ->get('Application\Service\EmService')
                ->getEntityManager();

        $controller = $this->params('controller');
        $ccAr = explode("\\", $controller);
        $this->controllerName = strtolower(array_pop($ccAr));

        $this->entityName = '\Application\Entity\Patient';

        return parent::onDispatch($e);
    }

    public function indexAction() {
        $cp = (int) $this->params()->fromQuery('p', 1);
        $itemPerPage = (int) $this->params()->fromQuery('ipp', 10);
        
        $records = $this->entityManager->getRepository($this->entityName)->findBy(array(), array('FirstName' => 'asc'));

        // Create a Doctrine Collection
        $collection = new ArrayCollection($records);

        // Create the paginator itself
        $paginator = new Paginator(new Adapter($collection));

        $paginator
                ->setCurrentPageNumber($cp)
                ->setItemCountPerPage($itemPerPage);

        $vm = new ViewModel(array(
            'records' => $paginator
        ));

        return $vm;
    }

    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function editAction() {

        $request = $this->getRequest();

        if ($request->isPost()) {
            $PersonID = $request->getPost()->get('PersonId', 'n/a');
            $sC = $request->getPost()->get('doctors', []);


            $qb = $this->entityManager->createQueryBuilder();
            $qb->add('select', 'c')
                    ->add('from', '\Application\Entity\Doctors c')
                    ->add('where', $qb->expr()->in('c.DoctorId', '?1'))
            ;
            $qb->setParameter(1, array_values($sC));

            $selectedDoctors = $qb->getQuery()
                    ->getResult();

            $allDoctors = $this->entityManager->getRepository("\Application\Entity\Doctors")->findAll();

            $tuple = $this->entityManager->find($this->entityName, $PersonID);

            $tuple->Doctors->clear();

            foreach ($selectedDoctors as $colour) {
                $tuple->Doctors->add($colour);
            }

            $tuple->IsMarried = $request->getPost()->get('IsMarried', '0');
            $tuple->IsInsured = $request->getPost()->get('IsInsured', '0');

            $this->entityManager->flush($tuple);

            return $this->redirect()->toRoute('application/default', array('controller' => "index", 'action' => 'index'));
        } else {
            $id = (int) $this->params('id');
            $msg = "";
            if ($id) {
                $record = $this->entityManager->find($this->entityName, $id);
                $doctors = $this->entityManager->getRepository("\Application\Entity\Doctors")->findAll();
            } else {
                $msg = "Record not Found!";
            }
            return new ViewModel(array(
                'record' => $record,
                'doctors' => $doctors,
                'msg' => $msg
            ));
        }
    }

}
