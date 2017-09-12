<?php
/**
 * Created by PhpStorm.
 * User: caminin
 * Date: 26/08/17
 * Time: 15:19
 */

namespace A2\CoreBundle\Form\Type\AddFile;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FileCategoryType extends AbstractType
{
    public function getName()
    {
        return 'file_category';
    }

    public function getParent()
    {
        return TextType::class;
    }
}