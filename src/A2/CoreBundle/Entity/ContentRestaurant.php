<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentRestaurant
 *
 * @ORM\Table(name="contentrestaurant")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\ContentRestaurantRepository")
 */
class ContentRestaurant
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
     * @ORM\Column(name="color_background", type="string", length=255)
     */
    private $colorBackground;

    /**
     * @var string
     *
     * @ORM\Column(name="color_menu", type="string", length=255)
     */
    private $colorMenu;

    /**
     * @var string
     *
     * @ORM\Column(name="color_dots", type="string", length=255)
     */
    private $colorDots;

    /**
     * @var string
     *
     * @ORM\Column(name="color_logo", type="string", length=255)
     */
    private $colorLogo;


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
     * Set colorBackground
     *
     * @param string $colorBackground
     *
     * @return ContentRestaurant
     */
    public function setColorBackground($colorBackground)
    {
        $this->colorBackground = $colorBackground;

        return $this;
    }

    /**
     * Get colorBackground
     *
     * @return string
     */
    public function getColorBackground()
    {
        return $this->colorBackground;
    }

    /**
     * Set colorMenu
     *
     * @param string $colorMenu
     *
     * @return ContentRestaurant
     */
    public function setColorMenu($colorMenu)
    {
        $this->colorMenu = $colorMenu;

        return $this;
    }

    /**
     * Get colorMenu
     *
     * @return string
     */
    public function getColorMenu()
    {
        return $this->colorMenu;
    }

    /**
     * Set colorDots
     *
     * @param string $colorDots
     *
     * @return ContentRestaurant
     */
    public function setColorDots($colorDots)
    {
        $this->colorDots = $colorDots;

        return $this;
    }

    /**
     * Get colorDots
     *
     * @return string
     */
    public function getColorDots()
    {
        return $this->colorDots;
    }

    /**
     * Set colorLogo
     *
     * @param string $colorLogo
     *
     * @return ContentRestaurant
     */
    public function setColorLogo($colorLogo)
    {
        $this->colorLogo = $colorLogo;

        return $this;
    }

    /**
     * Get colorLogo
     *
     * @return string
     */
    public function getColorLogo()
    {
        return $this->colorLogo;
    }
}

