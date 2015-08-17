<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Table(name="Doctors")
 * @ORM\Entity 
 */
class Doctors {

    /** @ORM\Id 
     * @ORM\Column(name="DoctorId", type="integer", nullable=false) 
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $DoctorId;

    /** @ORM\Column(name="Name", type="string", length=50, nullable=false) */
    protected $Name;
    
    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="IsInsured", type="integer", nullable=false)
     */
    protected $IsInsured;
   

    public function __construct() {        
    }
    
    public function __set($name, $value) {
        if (property_exists($this, $name))
            $this->$name = $value;
    }

    public function __get($name) {
        if (property_exists($this, $name))
            return $this->$name;
    }

}

?>