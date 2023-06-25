<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class Music1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('title')
            // ->add('description')
            // ->add('author')
            // ->add('imageName')
            // ->add('slug')
            // ->add('updatedAt')
            // ->add('length')
            // ->add('audioName')
            // ->add('category')
            // ->add('playlists')
            // ->add('users')

			->add('title')
            ->add('description')
            ->add('author')
            // ->add('imageName')
            ->add('imageFile', VichImageType::class, [
                'required'=>false,
                'label'=>"Image de la musique",
                // 'attr'=>["class"=>"img-fluid"]
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