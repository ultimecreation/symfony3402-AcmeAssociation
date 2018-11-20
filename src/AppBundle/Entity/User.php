<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="Articles",mappedBy="user")
     */
    private $articles;
    /**
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="user")
     */
    private $comments;
    /**
     *@ORM\OneToMany(targetEntity="Actions",mappedBy="user")
     */
    private $actions;
    /**
     * @ORM\OneToMany(targetEntity="Administrateur",mappedBy="user")
     */
    private $administrateur;
    /**
     * @ORM\OneToMany(targetEntity="Bureau",mappedBy="user")
     */
    private $bureau;
    /**
     * @ORM\OneToMany(targetEntity="Missions",mappedBy="user")
     */
    private $missions;
    /**
     * @ORM\OneToMany(targetEntity="Presidence",mappedBy="user")
     */
    private $presidence;
    
    public function __construct()
    {
        parent::__construct();
        $this->articles = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->actions = new ArrayCollection();
        $this->administrateur = new ArrayCollection();
        $this->bureau = new ArrayCollection();
        $this->missions = new ArrayCollection();
    }


    /**
     * Add article
     *
     * @param \AppBundle\Entity\Articles $article
     *
     * @return User
     */
    public function addArticle(\AppBundle\Entity\Articles $article)
    {
        $this->articles[] = $article;
    
        return $this;
    }

    /**
     * Remove article
     *
     * @param \AppBundle\Entity\Articles $article
     */
    public function removeArticle(\AppBundle\Entity\Articles $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }
    

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
    
        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add action
     *
     * @param \AppBundle\Entity\Actions $action
     *
     * @return User
     */
    public function addAction(\AppBundle\Entity\Actions $action)
    {
        $this->actions[] = $action;
    
        return $this;
    }

    /**
     * Remove action
     *
     * @param \AppBundle\Entity\Actions $action
     */
    public function removeAction(\AppBundle\Entity\Actions $action)
    {
        $this->actions->removeElement($action);
    }

    /**
     * Get actions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Add administrateur
     *
     * @param \AppBundle\Entity\Administrateur $administrateur
     *
     * @return User
     */
    public function addAdministrateur(\AppBundle\Entity\Administrateur $administrateur)
    {
        $this->administrateur[] = $administrateur;
    
        return $this;
    }

    /**
     * Remove administrateur
     *
     * @param \AppBundle\Entity\Administrateur $administrateur
     */
    public function removeAdministrateur(\AppBundle\Entity\Administrateur $administrateur)
    {
        $this->administrateur->removeElement($administrateur);
    }

    /**
     * Get administrateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * Add bureau
     *
     * @param \AppBundle\Entity\Bureau $bureau
     *
     * @return User
     */
    public function addBureau(\AppBundle\Entity\Bureau $bureau)
    {
        $this->bureau[] = $bureau;
    
        return $this;
    }

    /**
     * Remove bureau
     *
     * @param \AppBundle\Entity\Bureau $bureau
     */
    public function removeBureau(\AppBundle\Entity\Bureau $bureau)
    {
        $this->bureau->removeElement($bureau);
    }

    /**
     * Get bureau
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * Add mission
     *
     * @param \AppBundle\Entity\Missions $mission
     *
     * @return User
     */
    public function addMission(\AppBundle\Entity\Missions $mission)
    {
        $this->missions[] = $mission;
    
        return $this;
    }

    /**
     * Remove mission
     *
     * @param \AppBundle\Entity\Missions $mission
     */
    public function removeMission(\AppBundle\Entity\Missions $mission)
    {
        $this->missions->removeElement($mission);
    }

    /**
     * Get missions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * Add presidence
     *
     * @param \AppBundle\Entity\Presidence $presidence
     *
     * @return User
     */
    public function addPresidence(\AppBundle\Entity\Presidence $presidence)
    {
        $this->presidence[] = $presidence;
    
        return $this;
    }

    /**
     * Remove presidence
     *
     * @param \AppBundle\Entity\Presidence $presidence
     */
    public function removePresidence(\AppBundle\Entity\Presidence $presidence)
    {
        $this->presidence->removeElement($presidence);
    }

    /**
     * Get presidence
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPresidence()
    {
        return $this->presidence;
    }
}
