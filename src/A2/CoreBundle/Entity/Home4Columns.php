<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Xmon\ColorPickerTypeBundle\Validator\Constraints as XmonAssertColor;

/**
 * Home4Columns
 *
 * @ORM\Table(name="home4columns")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\Home4ColumnsRepository")
 * @Vich\Uploadable
 */
class Home4Columns
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
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Categories", cascade={"persist"})
     * @JoinColumn(name="categories_id_left", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $categoryLeft;

    /**
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Categories", cascade={"persist"})
     * @JoinColumn(name="categories_id_left_center", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $categoryLeftCenter;

    /**
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Categories", cascade={"persist"})
     * @JoinColumn(name="categories_id_right_center", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $categoryRightCenter;

    /**
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Categories", cascade={"persist"})
     * @JoinColumn(name="categories_id_right", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $categoryRight;

    /**
     * @var string
     *
     * @ORM\Column(name="image_left", type="string", length=255)
     */
    private $imageLeft;

    /**
     * @var string
     *
     * @ORM\Column(name="image_left_center", type="string", length=255)
     */
    private $imageLeftCenter;

    /**
     * @var string
     *
     * @ORM\Column(name="image_right_center", type="string", length=255)
     */
    private $imageRightCenter;

    /**
     * @var string
     *
     * @ORM\Column(name="image_right", type="string", length=255)
     */
    private $imageRight;

    /**
     * @var string
     *
     * @ORM\Column(name="text_bottom", type="string", length=1024)
     */
    private $textBottom;

    /**
     * @var string
     *
     * @ORM\Column(name="image_logo", type="string", length=255)
     */
    private $imageLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="color_categories", type="string", length=255)
     * @XmonAssertColor\HexColor()
     */
    private $colorCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="color_border_categories", type="string", length=255)
     * @XmonAssertColor\HexColor()
     */
    private $colorBorderCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="color_background", type="string", length=255)
     * @XmonAssertColor\HexColor()
     */
    private $colorBackground;

    /**
     * @var string
     *
     * @ORM\Column(name="color_logo", type="string", length=255)
     * @XmonAssertColor\HexColor()
     */
    private $colorLogo;

    /**
     * @Vich\UploadableField(mapping="Theme", fileNameProperty="imageLeft")
     * @var File
     */
    private $imageLeftFile;

    /**
     * @Vich\UploadableField(mapping="Theme", fileNameProperty="imageLeftCenter")
     * @var File
     */
    private $imageLeftCenterFile;

    /**
     * @Vich\UploadableField(mapping="Theme", fileNameProperty="imageRightCenter")
     * @var File
     */
    private $imageRightCenterFile;

    /**
     * @Vich\UploadableField(mapping="Theme", fileNameProperty="imageRight")
     * @var File
     */
    private $imageRightFile;
    /**
     * @Vich\UploadableField(mapping="Theme", fileNameProperty="imageLogo")
     * @var File
     */
    private $imageLogoFile;
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;



    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->updatedAt = new \Datetime();

    }

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
     * @return mixed
     */
    public function getCategoryLeft()
    {
        return $this->categoryLeft;
    }

    /**
     * @param mixed $categoryLeft
     */
    public function setCategoryLeft($categoryLeft)
    {
        $this->categoryLeft = $categoryLeft;
    }

    /**
     * @return mixed
     */
    public function getCategoryLeftCenter()
    {
        return $this->categoryLeftCenter;
    }

    /**
     * @param mixed $categoryLeftCenter
     */
    public function setCategoryLeftCenter($categoryLeftCenter)
    {
        $this->categoryLeftCenter = $categoryLeftCenter;
    }

    /**
     * @return mixed
     */
    public function getCategoryRightCenter()
    {
        return $this->categoryRightCenter;
    }

    /**
     * @param mixed $categoryRightCenter
     */
    public function setCategoryRightCenter($categoryRightCenter)
    {
        $this->categoryRightCenter = $categoryRightCenter;
    }

    /**
     * @return mixed
     */
    public function getCategoryRight()
    {
        return $this->categoryRight;
    }

    /**
     * @param mixed $categoryRight
     */
    public function setCategoryRight($categoryRight)
    {
        $this->categoryRight = $categoryRight;
    }



    /**
     * Set imageLeft
     *
     * @param string $imageLeft
     *
     * @return Home4Columns
     */
    public function setImageLeft($imageLeft)
    {
        $this->imageLeft = $imageLeft;

        return $this;
    }

    /**
     * Get imageLeft
     *
     * @return string
     */
    public function getImageLeft()
    {
        return $this->imageLeft;
    }

    /**
     * Set imageLeftCenter
     *
     * @param string $imageLeftCenter
     *
     * @return Home4Columns
     */
    public function setImageLeftCenter($imageLeftCenter)
    {
        $this->imageLeftCenter = $imageLeftCenter;

        return $this;
    }

    /**
     * Get imageLeftCenter
     *
     * @return string
     */
    public function getImageLeftCenter()
    {
        return $this->imageLeftCenter;
    }

    /**
     * Set imageRightCenter
     *
     * @param string $imageRightCenter
     *
     * @return Home4Columns
     */
    public function setImageRightCenter($imageRightCenter)
    {
        $this->imageRightCenter = $imageRightCenter;

        return $this;
    }

    /**
     * Get imageRightCenter
     *
     * @return string
     */
    public function getImageRightCenter()
    {
        return $this->imageRightCenter;
    }

    /**
     * Set imageRight
     *
     * @param string $imageRight
     *
     * @return Home4Columns
     */
    public function setImageRight($imageRight)
    {
        $this->imageRight = $imageRight;

        return $this;
    }

    /**
     * Get imageRight
     *
     * @return string
     */
    public function getImageRight()
    {
        return $this->imageRight;
    }

    /**
     * Set textBottom
     *
     * @param string $textBottom
     *
     * @return Home4Columns
     */
    public function setTextBottom($textBottom)
    {
        $this->textBottom = $textBottom;

        return $this;
    }

    /**
     * Get textBottom
     *
     * @return string
     */
    public function getTextBottom()
    {
        return $this->textBottom;
    }

    /**
     * Set imageLogo
     *
     * @param string $imageLogo
     *
     * @return Home4Columns
     */
    public function setImageLogo($imageLogo)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * Get imageLogo
     *
     * @return string
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }

    /**
     * @return string
     */
    public function getColorCategories()
    {
        return $this->colorCategories;
    }

    /**
     * @param string $colorCategories
     */
    public function setColorCategories($colorCategories)
    {
        $this->colorCategories = $colorCategories;
    }

    /**
     * @return string
     */
    public function getColorBorderCategories()
    {
        return $this->colorBorderCategories;
    }

    /**
     * @param string $colorBorderCategories
     */
    public function setColorBorderCategories($colorBorderCategories)
    {
        $this->colorBorderCategories = $colorBorderCategories;
    }

    /**
     * @return string
     */
    public function getColorBackground()
    {
        return $this->colorBackground;
    }

    /**
     * @param string $colorBackground
     */
    public function setColorBackground($colorBackground)
    {
        $this->colorBackground = $colorBackground;
    }

    /**
     * @return string
     */
    public function getColorLogo()
    {
        return $this->colorLogo;
    }

    /**
     * @param string $colorLogo
     */
    public function setColorLogo($colorLogo)
    {
        $this->colorLogo = $colorLogo;
    }




    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Home4Columns
     *
     */

    public function setImageLeftFile(File $image = null)
    {
        $this->imageLeft = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    public function getImageLeftFile()
    {
        return $this->imageLeft;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Home4Columns
     */

    public function setImageRightFile(File $image = null)
    {
        $this->imageRight = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    public function getImageRightFile()
    {
        return $this->imageRight;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Home4Columns
     */

    public function setImageLeftCenterFile(File $image = null)
    {
        $this->imageLeftCenter = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    public function getImageLeftCenterFile()
    {
        return $this->imageLeftCenter;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Home4Columns
     */

    public function setImageRightCenterFile(File $image = null)
    {
        $this->imageRightCenter = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    public function getImageRightCenterFile()
    {
        return $this->imageRightCenter;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Home4Columns
     */

    public function setImageLogoFile(File $image = null)
    {
        $this->imageLogo = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    public function getImageLogoFile()
    {
        return $this->imageLogo;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Home4Columns
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

