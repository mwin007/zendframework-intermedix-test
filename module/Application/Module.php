<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $serviceManager = $e->getApplication()->getServiceManager();
        $serviceManager->get('viewhelpermanager')->setFactory('actionName', function($sm) use ($e) {
                    return new \Application\View\Helper\ActionName($e->getRouteMatch());
                });
        $serviceManager->get('viewhelpermanager')->setFactory('controllerName', function($sm) use ($e) {
                    return new \Application\View\Helper\ControllerName($e->getRouteMatch());
                });
        $serviceManager->get('viewhelpermanager')->setFactory('isEqual', function($sm) use ($e) {
                    return new \Application\View\Helper\IsEqual($e->getRouteMatch());
                });
        $serviceManager->get('viewhelpermanager')->setFactory('isUnder18', function($sm) use ($e) {
                    return new \Application\View\Helper\IsUnder18($e->getRouteMatch());
                });
                
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig() {

        return array(
            'factories' => array(
                'Application\Service\EmService' => function ($sm) {
                    return new \Application\Service\EmService($sm);
                },
            )
        );
    }
}
