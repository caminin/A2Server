<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\FilesRepository")
 * @Vich\Uploadable
 */
class Files
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
     * @ORM\Column(name="files_name", type="string", length=255)
     */
    private $filesName;

    /**
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Categories", cascade={"persist"})
     * @JoinColumn(name="categories_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $filesCategory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="files_date_creation", type="date")
     */
    private $filesDateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="files_display_type", type="string", length=1)
     */
    private $filesDisplayType;
    /**
     * @Vich\UploadableField(mapping="Files", fileNameProperty="filesName")
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;



    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->filesDateCreation = new \Datetime();

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
     * Set filesName
     *
     * @param string $filesName
     *
     * @return Files
     */
    public function setFilesName($filesName)
    {
        $this->filesName = $filesName;

        return $this;
    }

    /**
     * Get filesName
     *
     * @return string
     */
    public function getFilesName()
    {
        return $this->filesName;
    }

    /**
     * Set filesCategory
     *
     * @param string $filesCategory
     *
     * @return Files
     */
    public function setFilesCategory($filesCategory)
    {
        $this->filesCategory = $filesCategory;

        return $this;
    }

    /**
     * Get filesCategory
     *
     * @return string
     */
    public function getFilesCategory()
    {
        return $this->filesCategory;
    }

    /**
     * Set filesDateCreation
     *
     * @param \DateTime $filesDateCreation
     *
     * @return Files
     */
    public function setFilesDateCreation($filesDateCreation)
    {
        $this->filesDateCreation = $filesDateCreation;

        return $this;
    }

    /**
     * Get filesDateCreation
     *
     * @return \DateTime
     */
    public function getFilesDateCreation()
    {
        return $this->filesDateCreation;
    }

    /**
     * Set filesDisplayType
     *
     * @param string $filesDisplayType
     *
     * @return Files
     */
    public function setFilesDisplayType($filesDisplayType)
    {
        $this->filesDisplayType = $filesDisplayType;

        return $this;
    }

    /**
     * Get filesDisplayType
     *
     * @return string
     */
    public function getFilesDisplayType()
    {
        return $this->filesDisplayType;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Files
     */
    
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
    
    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Files
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
