<?php

/**
 * Entity Manager
 */
namespace Application\Service;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EmService implements ServiceLocatorAwareInterface
{
    protected $sm;
    protected $em;

    
    public function __construct($sm)
    {
        $this->sm = $sm;
    }   
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        
    }    
    
    public function getServiceLocator()
    {
        return $this->sm;
    }   
  
    /**
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager() 
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    /**
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEntityManager(EntityManager $em) 
    {
        $this->em = $em;
    }        
     

}