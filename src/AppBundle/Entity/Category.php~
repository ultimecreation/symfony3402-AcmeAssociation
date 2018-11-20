<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Articles;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    
    /**
     *@ORM\ManyToMany(targetEntity="Articles", mappedBy="category",cascade={"persist"},fetch="EAGER")
    * @ORM\OrderBy({"id"="desc"})
     * 
     */
    protected $articles;

    public function __construct() {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     *
     * @return Category
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
     * Add article
     *
     * @param \AppBundle\Entity\Articles $article
     *
     * @return Category
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
    public function __toString(){
        // to show the name of the Category in the select
        return $this->getName();
        // to show the id of the Category in the select
        // return $this->id;
    }
}
