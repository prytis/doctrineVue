<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tools")
 */
class Tool
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string") 
     */
    protected $name;

    /**
     * One Tool has One Person.
     * @ORM\OneToOne(targetEntity="Persons")
     * @ORM\JoinColumn(name="Person_id", referencedColumnName="id")
     */
    private $person;

    /**
     * One product has many couples. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Couple", mappedBy="product")
     */
    private $tools;

    public function __construct() {
        $this->tools = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setPersom($s)
    {
        $this->person = $s;
    }
}

/**
 * @ORM\Entity
 * @ORM\Table(name="persons")
 */
class Persons
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="string") 
     */
    protected $personDetails;

    public function setPersonDetails($details)
    {
        $this->personDetails = $details;
    }

    public function getPersonDetails()
    {
        return $this->PersonDetails;
    }
}

/**
 * @ORM\Entity
 * @ORM\Table(name="couples")
 */
class Couple
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * Many couples have one tool. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Tool", inversedBy="couples")
     * @ORM\JoinColumn(name="tool_id", referencedColumnName="id")
     */
    private $tool;

    public function getName()
    {
        return $this->name;
    }
}
