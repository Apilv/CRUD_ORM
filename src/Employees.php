<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
class Employees
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
     * @ORM\Column(type="integer")
     */
    private $project_id;



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

    public function getProjectId()
    {
        return $this->project_id;
    }

    public function setProjectId($prj_id)
    {
        $this->project_id = $prj_id;
    }

    public function __construct(){

    }
}

