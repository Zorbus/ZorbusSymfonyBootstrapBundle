<?php

namespace Zorbus\SymfonyBootstrapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\SymfonyBootstrapBundle\Entity\Bundle
 */
class Bundle
{
    public function __construct()
    {
        $this->html = $this->getHtml();
    }
    public function __toString()
    {
        return $this->getName();
    }

    public function getHtml()
    {
        return $this->website ? sprintf('<a href="%s" target="_blank">%s</a>', $this->getWebsite(), $this->__toString()) : $this->__toString();

    }
    public $html;

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
     * @var string $category
     */
    private $category;

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
     * @return Bundle
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
     * @return Bundle
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
     * Set category
     *
     * @param string $category
     * @return Bundle
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set is_enabled
     *
     * @param boolean $isEnabled
     * @return Bundle
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
    /**
     * @var string $website
     */
    private $website;


    /**
     * Set website
     *
     * @param string $website
     * @return Bundle
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }
}