<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @ORM\Table(name="Patient")
 * @ORM\Entity 
 */
class Patient {

    /** @ORM\Id 
     * @ORM\Column(name="PersonId", type="integer", nullable=false) 
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $PersonId;

    /** @ORM\Column(name="FirstName", type="string", length=50, nullable=false) */
    protected $FirstName;

    /** @ORM\Column(name="LastName", type="string", length=50, nullable=false) */
    protected $LastName;
        
    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="IsMarried", type="integer", nullable=false)
     */
    protected $IsMarried;
    
    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="IsValid", type="integer", nullable=false)
     */
    protected $IsValid;
    
    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="IsInsured", type="integer", nullable=false)
     */
    protected $IsInsured;
   
    /** @ORM\ManyToMany(targetEntity="Doctors")
     *  @ORM\JoinTable(name="FavouriteDoctors",
     *      joinColumns={@ORM\JoinColumn(name="PersonId", referencedColumnName="PersonId")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="DoctorId", referencedColumnName="DoctorId")}
     *      )
     */
    protected $Doctors = null;  

    public function __construct() {
        $this->Doctors = new ArrayCollection();
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