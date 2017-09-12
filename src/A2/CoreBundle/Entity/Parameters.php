<?php

namespace A2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameters
 *
 * @ORM\Table(name="Parameters")
 * @ORM\Entity(repositoryClass="A2\CoreBundle\Repository\ParametersRepository")
 */
class Parameters
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
     * @ORM\Column(name="parameters_name", type="string", length=255)
     */
    private $parametersName;

    /**
     * @var string
     *
     * @ORM\Column(name="parameters_value", type="string", length=1024)
     */
    private $parametersValue;

    /**
     * @var string
     *
     * @ORM\Column(name="parameters_label", type="string", length=255)
     */
    private $parametersLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="parameters_category", type="string", length=255)
     */
    private $parametersCategory;


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
     * Set parametersName
     *
     * @param string $parametersName
     *
     * @return Parameters
     */
    public function setParametersName($parametersName)
    {
        $this->parametersName = $parametersName;

        return $this;
    }

    /**
     * Get parametersName
     *
     * @return string
     */
    public function getParametersName()
    {
        return $this->parametersName;
    }

    /**
     * Set parametersValue
     *
     * @param string $parametersValue
     *
     * @return Parameters
     */
    public function setParametersValue($parametersValue)
    {
        $this->parametersValue = $parametersValue;

        return $this;
    }

    /**
     * Get parametersValue
     *
     * @return string
     */
    public function getParametersValue()
    {
        return $this->parametersValue;
    }

    /**
     * Set parametersLabel
     *
     * @param string $parametersLabel
     *
     * @return Parameters
     */
    public function setParametersLabel($parametersLabel)
    {
        $this->parametersLabel = $parametersLabel;

        return $this;
    }

    /**
     * Get parametersLabel
     *
     * @return string
     */
    public function getParametersLabel()
    {
        return $this->parametersLabel;
    }

    /**
     * Set parametersCategory
     *
     * @param string $parametersCategory
     *
     * @return Parameters
     */
    public function setParametersCategory($parametersCategory)
    {
        $this->parametersCategory = $parametersCategory;

        return $this;
    }

    /**
     * Get parametersCategory
     *
     * @return string
     */
    public function getParametersCategory()
    {
        return $this->parametersCategory;
    }

}

