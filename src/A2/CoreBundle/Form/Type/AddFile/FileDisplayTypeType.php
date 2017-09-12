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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileDisplayTypeType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $choice_list=array(
            'Limité dans le temps' => 't',
            'À durée permanente' => 'p',
        );
        $resolver->setDefaults(array(
            'choices' => $choice_list,
            'expanded' => true,
            'multiple' => false,
            'data' => current($choice_list), PHP_EOL,
            'choice_attr' => function($val, $key, $index) {
                // adds a class like attending_yes, attending_no, etc
                return ['class' => 'radio'];
            },
        ));
    }

    public function getName()
    {
        return 'file_display_type';
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}