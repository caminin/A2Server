<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;
use JsonSerializable;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\CategoriesRepository")
 */
class Categories implements JsonSerializable
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
     * @ManyToOne(targetEntity="categories", cascade={"remove"})
     * @JoinColumn(name="categories_id_parent", referencedColumnName="id", nullable=true)
     *
     */
    private $categoriesIdParent;

    /**
     * @var string
     *
     * @ORM\Column(name="categories_label", type="string", length=255)
     */
    private $categoriesLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="categories_name", type="string", length=255)
     */
    private $categoriesName;


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
     * Set categoriesIdParent
     *
     * @param string $categoriesIdParent
     *
     * @return Categories
     */
    public function setCategoriesIdParent($categoriesIdParent)
    {
        $this->categoriesIdParent = $categoriesIdParent;

        return $this;
    }

    /**
     * Get categoriesIdParent
     *
     * @return string
     */
    public function getCategoriesIdParent()
    {
        return $this->categoriesIdParent;
    }

    /**
     * Set categoriesLabel
     *
     * @param string $categoriesLabel
     *
     * @return Categories
     */
    public function setCategoriesLabel($categoriesLabel)
    {
        $this->categoriesLabel = $categoriesLabel;

        return $this;
    }

    /**
     * Get categoriesLabel
     *
     * @return string
     */
    public function getCategoriesLabel()
    {
        return $this->categoriesLabel;
    }

    /**
     * Set categoriesName
     *
     * @param string $categoriesName
     *
     * @return Categories
     */
    public function setCategoriesName($categoriesName)
    {
        $this->categoriesName = $categoriesName;

        return $this;
    }

    /**
     * Get categoriesName
     *
     * @return string
     */
    public function getCategoriesName()
    {
        return $this->categoriesName;
    }

    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'categoriesIdParent' => $this->categoriesIdParent,
            'categoriesLabel'=> $this->categoriesLabel,
            'categoriesName'=> $this->categoriesName,
        );
    }
}
