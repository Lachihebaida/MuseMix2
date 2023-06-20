<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('author')
            // ->add('imageName')

            ->add('imageFile', FileType::class, [
                'required'=>false,
                'label'=>"Image de la musique",
            ])
            
            ->add('audioFile', FileType::class, [
                'required'=>false,
                'label'=>"Votre fichier audio",
            ])
            // ->remove('updatedAt', DateTimeType::class, [
            //     'widget'=>'single_text',
            //     'data'=> new \DateTimeImmutable(),
            // ])
            ->add('slug')
            ->add('category', EntityType::class, [
                'class'=> 'App\Entity\Category',
                'multiple'=>false,
                'attr'=> [
                    'class'=> "select2",
                ],
                // 'expanded'=>false, //Cases à cocher
                // 'multiple'=>true
            ])
            // ->add('playlists')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
