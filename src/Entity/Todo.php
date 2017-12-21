<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoRepository")
 */
class Todo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEcheance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fait;

    public function __construct(){
        $this->fait = false;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of dateEcheance
     */ 
    public function getDateEcheance()
    {
        return $this->dateEcheance;
    }

    /**
     * Set the value of dateEcheance
     *
     * @return  self
     */ 
    public function setDateEcheance($dateEcheance)
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    /**
     * Get the value of fait
     */ 
    public function getFait()
    {
        return $this->fait;
    }

    /**
     * Set the value of fait
     *
     * @return  self
     */ 
    public function setFait($fait)
    {
        $this->fait = $fait;

        return $this;
    }
}
