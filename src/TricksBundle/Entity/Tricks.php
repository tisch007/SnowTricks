<?php

namespace TricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Tricks
 *
 * @ORM\Table(name="tricks")
 * @ORM\Entity(repositoryClass="TricksBundle\Repository\TricksRepository")
 * @UniqueEntity(
 *      fields={"title"},
 *      message="Ce Trick existe déjà."
 * )
 */
class Tricks
{
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string")
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="dateAjout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity="TricksBundle\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="TricksBundle\Entity\Video", mappedBy="Video")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Tricks
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Tricks
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Tricks
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
     * Set Category
     *
     * @param category $category
     *
     * @return Tricks
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set dateAjout
     *
     * @param datetime $dateAjout
     *
     * @return Tricks
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return datetime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add video
     *
     * @param \TricksBundle\Entity\Video $video
     *
     * @return Tricks
     */
    public function addVideo(\TricksBundle\Entity\Video $video)
    {
        $this->video[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \TricksBundle\Entity\Video $video
     */
    public function removeVideo(\TricksBundle\Entity\Video $video)
    {
        $this->video->removeElement($video);
    }

    /**
     * Get video
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideo()
    {
        return $this->video;
    }
}
