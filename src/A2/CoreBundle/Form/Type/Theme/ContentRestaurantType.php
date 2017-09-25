<?php

namespace A2\CoreBundle\Form\Type\Theme;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;

class ContentRestaurantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('colorBackground',ColorPickerType::class)
            ->add('colorMenu',ColorPickerType::class)
            ->add('colorDots',ColorPickerType::class)
            ->add('colorLogo',ColorPickerType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'A2\CoreBundle\Entity\ContentRestaurant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'a2_corebundle_contentrestaurant';
    }


}
