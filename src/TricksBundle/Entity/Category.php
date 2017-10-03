<?php

namespace TricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity(repositoryClass="TricksBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="tricks", type="array")
     */
    private $tricks;


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
     * Set name
     *
     * @param string $name
     *
     * @return category
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
     * Set tricks
     *
     * @param array $tricks
     *
     * @return category
     */
    public function setTricks($tricks)
    {
        $this->tricks = $tricks;

        return $this;
    }

    /**
     * Get tricks
     *
     * @return array
     */
    public function getTricks()
    {
        return $this->tricks;
    }
}

