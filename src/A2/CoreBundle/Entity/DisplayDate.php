<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * DisplayDate
 *
 * @ORM\Table(name="display_date")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\DisplayDateRepository")
 */
class DisplayDate
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
     * @ManyToOne(targetEntity="A2\CoreBundle\Entity\Files", cascade={"remove"})
     * @JoinColumn(name="date_files_id", referencedColumnName="id", nullable=false)
     */
    private $dateFilesId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date")
     */
    private $dateEnd;


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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return DisplayDate
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return DisplayDate
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set dateFilesId
     *
     * @param \A2\CoreBundle\Entity\Files $dateFilesId
     *
     * @return DisplayDate
     */
    public function setDateFilesId(\A2\CoreBundle\Entity\Files $dateFilesId)
    {
        $this->dateFilesId = $dateFilesId;

        return $this;
    }

    /**
     * Get dateFilesId
     *
     * @return \A2\CoreBundle\Entity\Files
     */
    public function getDateFilesId()
    {
        return $this->dateFilesId;
    }
}
