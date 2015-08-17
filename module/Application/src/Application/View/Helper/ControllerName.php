<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ControllerName extends AbstractHelper {

    protected $route;

    public function __construct($route) {
        $this->route = $route;
    }

    public function __invoke($param = "") {
        if ($this->route) {
            $controller = $this->route->getParam('controller', 'n/a');

            switch ($param) {
                case "nameOnlyLC":
                    $ccAr = explode("\\", $controller);
                    $controller = strtolower(array_pop($ccAr));
                    break;
                default:

                    break;
            }

            return $controller;
        }
    }

}