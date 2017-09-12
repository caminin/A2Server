<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menus
 *
 * @ORM\Table(name="menus")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\MenusRepository")
 */
class Menus
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
     * @ORM\Column(name="menus_label", type="string", length=255)
     */
    private $menusLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="menus_name", type="string", length=255)
     */
    private $menusName;

    /**
     * @var string
     *
     * @ORM\Column(name="menus_path", type="string", length=255)
     */
    private $menusPath;

    /**
     * @var string
     *
     * @ORM\Column(name="menus_icon", type="string", length=255)
     */
    private $menusIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="menus_parent", type="string", length=255)
     */
    private $menusParent;


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
     * Set menusLabel
     *
     * @param string $menusLabel
     *
     * @return Menus
     */
    public function setMenusLabel($menusLabel)
    {
        $this->menusLabel = $menusLabel;

        return $this;
    }

    /**
     * Get menusLabel
     *
     * @return string
     */
    public function getMenusLabel()
    {
        return $this->menusLabel;
    }

    /**
     * Set menusName
     *
     * @param string $menusName
     *
     * @return Menus
     */
    public function setMenusName($menusName)
    {
        $this->menusName = $menusName;

        return $this;
    }

    /**
     * Get menusName
     *
     * @return string
     */
    public function getMenusName()
    {
        return $this->menusName;
    }

    /**
     * Set menusPath
     *
     * @param string $menusPath
     *
     * @return Menus
     */
    public function setMenusPath($menusPath)
    {
        $this->menusPath = $menusPath;

        return $this;
    }

    /**
     * Get menusPath
     *
     * @return string
     */
    public function getMenusPath()
    {
        return $this->menusPath;
    }

    /**
     * Set menusIcon
     *
     * @param string $menusIcon
     *
     * @return Menus
     */
    public function setMenusIcon($menusIcon)
    {
        $this->menusIcon = $menusIcon;

        return $this;
    }

    /**
     * Get menusIcon
     *
     * @return string
     */
    public function getMenusIcon()
    {
        return $this->menusIcon;
    }

    /**
     * Set menusParent
     *
     * @param string $menusParent
     *
     * @return Menus
     */
    public function setMenusParent($menusParent)
    {
        $this->menusParent = $menusParent;

        return $this;
    }

    /**
     * Get menusParent
     *
     * @return string
     */
    public function getMenusParent()
    {
        return $this->menusParent;
    }
}
