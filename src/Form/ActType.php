<?php

namespace App\Form;

use App\Entity\Act;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description', CKEditorType::class)
            ->add('pictureFile', VichImageType::class, [
            'required'      => false,
            'allow_delete'  => false, // not mandatory, default is true
            'download_uri' => false, // not mandatory, default is true
            'image_uri' => true,
            ])
            ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Act::class,
        ]);
    }
}
