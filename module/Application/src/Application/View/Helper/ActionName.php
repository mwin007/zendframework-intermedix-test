<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ActionName extends AbstractHelper {

    protected $route;

    public function __construct($route) {
        $this->route = $route;
    }

    public function __invoke($param = "") {
        if ($this->route) {
            $action = $this->route->getParam('action', 'n/a');

            switch ($param) {
                case "nameOnlyLC":
                    $actAr = explode("\\", $action);
                    $action = strtolower(array_pop($actAr));
                    break;
                default:

                    break;
            }
            return $action;
        }
    }

}
