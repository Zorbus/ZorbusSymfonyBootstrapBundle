<?php

namespace Zorbus\SymfonyBootstrapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\SymfonyBootstrapBundle\Entity\Project
 */
class Project
{
    public function __toString()
    {
        return '#'.$this->getId().' '.$this->getName();
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
     * @var string $author
     */
    private $author;

    /**
     * @var email $email
     */
    private $email;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var string $symfony
     */
    private $symfony;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $bundles;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $repositories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bundles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->repositories = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Project
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
     * Set author
     *
     * @param string $author
     * @return Project
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set email
     *
     * @param email $email
     * @return Project
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set symfony
     *
     * @param string $symfony
     * @return Project
     */
    public function setSymfony($symfony)
    {
        $this->symfony = $symfony;

        return $this;
    }

    /**
     * Get symfony
     *
     * @return string
     */
    public function getSymfony()
    {
        return $this->symfony;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add bundles
     *
     * @param Zorbus\SymfonyBootstrapBundle\Entity\Bundle $bundles
     * @return Project
     */
    public function addBundle(\Zorbus\SymfonyBootstrapBundle\Entity\Bundle $bundles)
    {
        $this->bundles[] = $bundles;

        return $this;
    }

    /**
     * Remove bundles
     *
     * @param Zorbus\SymfonyBootstrapBundle\Entity\Bundle $bundles
     */
    public function removeBundle(\Zorbus\SymfonyBootstrapBundle\Entity\Bundle $bundles)
    {
        $this->bundles->removeElement($bundles);
    }

    /**
     * Get bundles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * Add repositories
     *
     * @param Zorbus\SymfonyBootstrapBundle\Entity\Repository $repositories
     * @return Project
     */
    public function addRepositorie(\Zorbus\SymfonyBootstrapBundle\Entity\Repository $repositories)
    {
        $this->repositories[] = $repositories;

        return $this;
    }

    /**
     * Remove repositories
     *
     * @param Zorbus\SymfonyBootstrapBundle\Entity\Repository $repositories
     */
    public function removeRepositorie(\Zorbus\SymfonyBootstrapBundle\Entity\Repository $repositories)
    {
        $this->repositories->removeElement($repositories);
    }

    /**
     * Get repositories
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRepositories()
    {
        return $this->repositories;
    }
    /**
     * @var boolean $processed
     */
    private $processed;

    /**
     * @var string $token
     */
    private $token;


    /**
     * Set processed
     *
     * @param boolean $processed
     * @return Project
     */
    public function setProcessed($processed = false)
    {
        $this->processed = $processed;

        return $this;
    }

    /**
     * Get processed
     *
     * @return boolean
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Project
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @ORM\PrePersist
     */
    public function doCreatedAt()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     */
    public function doToken()
    {
        $this->setToken(md5(rand().time().rand()));
    }

    /**
     * @ORM\PrePersist
     */
    public function doProcessed()
    {
        $this->setProcessed(false);
    }
}