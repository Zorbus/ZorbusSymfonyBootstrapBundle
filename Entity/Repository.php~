<?php

namespace Zorbus\SymfonyBootstrapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\SymfonyBootstrapBundle\Entity\Repository
 */
class Repository
{
    public function __toString()
    {
        return $this->getName();
    }
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $class
     */
    private $class;

    /**
     * @var boolean $is_enabled
     */
    private $is_enabled;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Repository
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Repository
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set is_enabled
     *
     * @param boolean $isEnabled
     * @return Repository
     */
    public function setIsEnabled($isEnabled)
    {
        $this->is_enabled = $isEnabled;

        return $this;
    }

    /**
     * Get is_enabled
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->is_enabled;
    }
}