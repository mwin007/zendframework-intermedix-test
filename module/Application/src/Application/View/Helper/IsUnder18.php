<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class IsUnder18 extends AbstractHelper {

    protected $route;

    public function __construct($route) {
        $this->route = $route;
    }

    public function __invoke($str) {
        $a = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
        return $a == strrev($a);
    }

}