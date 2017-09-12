<?php

namespace A2\CoreBundle\Form\Type\Theme;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;

class Home_4_ColumnsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('textBottom')
            ->add('colorBackground', ColorPickerType::class)
            ->add('colorLogo', ColorPickerType::class)
            ->add('colorCategories', ColorPickerType::class)
            ->add('colorBorderCategories', ColorPickerType::class)
            ->add('imageLogoFile',FileType::class)
            ->add('imageLeftFile',FileType::class)
            ->add('imageLeftCenterFile',FileType::class)
            ->add('imageRightCenterFile',FileType::class)
            ->add('imageRightFile',FileType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'A2\CoreBundle\Entity\Home_4_Columns'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'a2_corebundle_home_4_columns';
    }


}
