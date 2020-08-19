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
     * @ORM\Column(type="string") 
     */
    protected $project;

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

    public function getProject(){
        return $this->project;
    }

    public function getProjectId()
    {
        return $this->project_id;
    }

    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }

    public function __construct()
    {
    }
}
