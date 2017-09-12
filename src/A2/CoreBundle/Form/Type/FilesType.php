<?php

namespace A2\CoreBundle\Form\Type;

use A2\CoreBundle\Form\Type\AddFile\FileCategoryType;
use A2\CoreBundle\Form\Type\AddFile\FileDatePickerType;
use A2\CoreBundle\Form\Type\AddFile\FileDisplayTypeType;
use A2\CoreBundle\Form\Type\AddFile\FileNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('filesName', FileNameType::class)
            ->add('imageFile',FileType::class)
            ->add('filesDisplayType', FileDisplayTypeType::class)
            ->add('DatePicker', FileDatePickerType::class ,array(
                'mapped' => false,
                'property_path' => null,
            ))
            ->add('filesCategory', FileCategoryType::class,array(
                'mapped' => false,
                'property_path' => null,
                'required' => false
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'A2\CoreBundle\Entity\Files'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'a2_corebundle_files';
    }

}
