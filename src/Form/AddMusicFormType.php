<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AddMusicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('author')
            // ->add('imageName')
            ->add('imageFile', VichImageType::class, [
                'required'=>false,
                'label'=>"Image de la musique",
            ])
            ->add('audioFile', FileType::class, [
                'required'=>false,
                'label'=>"Votre fichier audio",
            ])
            ->add('slug')
            // ->add('length')
            ->add('category', EntityType::class, [
                'class'=> 'App\Entity\Category',
                'multiple'=>false,
                'attr'=> [
                    'class'=> "select2",
                ],
                ])
            // ->add('playlists')
            ->add('Publier', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
