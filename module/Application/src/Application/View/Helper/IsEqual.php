<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class IsEqual extends AbstractHelper {

    protected $route;

    public function __construct($route) {
        $this->route = $route;
    }

    public function __invoke($value1, $value2, $return="selected") {
        if($value1 === $value2) {
            return $return;
        }
    }

}