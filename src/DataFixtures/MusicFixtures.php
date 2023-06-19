<?php

// namespace App\DataFixtures;

// use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Persistence\ObjectManager;

// class MusicFixtures extends Fixture
// {
//     public function load(ObjectManager $manager): void
//     {
//         // $product = new Product();
//         // $manager->persist($product);

//         $manager->flush();
//     }
// }

namespace App\DataFixtures;
use App\Entity\Music;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;


class MusicFixtures extends Fixture
{
    public const CYBER_NIGHTS_SHORT ='cyber-nights-short';
    public function load(ObjectManager $manager): void
    {
        $music = new Music();
        $music->setTitle('Cyber-nights');
        // $music->setImageName('nu-disco.jpg');
        $music->setAudioName('free-test-data-100kb-mp3-648ef13ae2c43513148905.mp3');
        $music->setDescription('Joseph');
        $music->setAuthor("");
        $music->setCategory($this->getReference(CategoryFixtures::POP));
        $music->setSlug('cyber-nights');
        $manager->persist($music);


        $music = new Music(); 
        $music->setTitle('Cyber-nights');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('cyber-nights_short15sec.mp3');
        $music->setDescription('Joseph');
        $music->setAuthor("");
        $music->setSlug('cyber-nights');
        $music->setCategory($this->getReference(CategoryFixtures::TECH_HOUSE));
        $manager->persist($music);
        
        $music = new Music(); 
        $music->setTitle('Exciting-anticipation');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('exciting-anticipation-short15sec.mp3');
        $music->setDescription('Ricky-Bombino');
        $music->setAuthor("");
        $music->setSlug('exciting-anticipation');
        $music->setCategory($this->getReference(CategoryFixtures::TECH_HOUSE));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Tomorrow-s-future');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('Deep tech 15sec.mp3');
        $music->setDescription('Sound-and-vision');
        $music->setAuthor("");
        $music->setSlug('tomorrow-s-future');
        $music->setCategory($this->getReference(CategoryFixtures::TECH_HOUSE));
        $manager->persist($music);


        $music = new Music(); 
        $music->setTitle('The-sand-is-calling');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('The-sand-is-calling15sec.mp3');
        $music->setDescription('GG-Riggs');
        $music->setAuthor("");
        $music->setSlug('the-sand-is-calling');
        $music->setCategory($this->getReference(CategoryFixtures::POP_DANSE));
        $manager->persist($music);
        
        $music = new Music(); 
        $music->setTitle('OkOkOk');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('okokok15sec.mp3');
        $music->setDescription('Wolves');
        $music->setAuthor("");
        $music->setSlug('okokok');
        $music->setCategory($this->getReference(CategoryFixtures::POP_DANSE));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('In-to-deep');
        // $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioName('sugar-rush15sec.mp3');
        $music->setDescription('Soulish');
        $music->setAuthor("");
        $music->setSlug('in-to-deep');
        $music->setCategory($this->getReference(CategoryFixtures::POP_DANSE));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Best-of');
        // $music->setImageName('carnival-4092632_1920.jpg');
        $music->setAudioName('best-of-me15sec.mp3');
        $music->setDescription('JAM-studios');
        $music->setAuthor("");
        $music->setSlug('best-of');
        $music->setCategory($this->getReference(CategoryFixtures::COUNTRY_ROCK));
        $manager->persist($music);

        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Calling-out');
        // $music->setImageName('carnival-4092632_1920.jpg');
        $music->setAudioName('calling-out15sec.mp3');
        $music->setDescription('Alex-Purple');
        $music->setAuthor("");
        $music->setSlug('calling-out');
        $music->setCategory($this->getReference(CategoryFixtures:: NU_DISCO));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Long-ago');
        // $music->setImageName('carnival-4092632_1920.jpg');
        $music->setAudioName('long-ago15sec.mp3');
        $music->setDescription('Kanstantin-Garbuz');
        $music->setAuthor("");
        $music->setSlug('long-ago');
        $music->setCategory($this->getReference(CategoryFixtures::COUNTRY_ROCK));
        $manager->persist($music);

        
        $music = new Music(); 
        $music->setTitle('Log-cabin');
        // $music->setImageName('pexels-alena-darmel-7715771.jpg');
        $music->setAudioName('log-cabin15sec.mp3');
        $music->setDescription('Cruen');
        $music->setAuthor("");
        $music->setSlug('log-cabin');
        $music->setCategory($this->getReference(CategoryFixtures::COUNTRY_ROCK));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Better-days');
        // $music->setImageName('pexels-alena-darmel-7715771.jpg');
        $music->setAudioName('better-days_short 15sec.mp3');
        $music->setDescription('Colin-Fruser');
        $music->setAuthor("");
        $music->setSlug('better-days');
        $music->setCategory($this->getReference(CategoryFixtures::COUNTRY_ROCK));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Big-red-truck');
        // $music->setImageName('pexels-alena-darmel-7715771.jpg');
        $music->setAudioName('big-red-truck 15 sec.mp3');
        $music->setDescription('MVM-Productions');
        $music->setAuthor("");
        $music->setSlug('big-red-truck');
        $music->setCategory($this->getReference(CategoryFixtures::COUNTRY_ROCK));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Day-trader');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('day-trader15sec.mp315sec.mp3');
        $music->setDescription('Flash-Fluarity');
        $music->setAuthor("");
        $music->setSlug('day-trader');
        $music->setCategory($this->getReference(CategoryFixtures::BLUES));
        $manager->persist($music);
       
        $music = new Music(); 
        $music->setTitle('beat-to-go15sec.mp3');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('beat-to-go15sec.mp3');
        $music->setDescription('Flash-Fluarity');
        $music->setAuthor("");
        $music->setSlug('beat-to-go');
        $music->setCategory($this->getReference(CategoryFixtures::BLUES));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('at-first-place');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('at-first-place15sec.mp3');
        $music->setDescription('Ricky-Bombino');
        $music->setAuthor("");
        $music->setSlug('at-first-place');
        $music->setCategory($this->getReference(CategoryFixtures::BLUES));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('new-wave');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('new-wave15sec.mp3');
        $music->setDescription('Oakvale-of-Albion');
        $music->setAuthor("");
        $music->setSlug('new-wave');
        $music->setCategory($this->getReference(CategoryFixtures::POP));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('neons');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('neons15sec.mp3');
        $music->setDescription('Hartley');
        $music->setAuthor("");
        $music->setSlug('neons');
        $music->setCategory($this->getReference(CategoryFixtures::POP));
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Wall-of-fame15sec.mp3');
        // $music->setImageName('pexels-cottonbro-studio-9403121.jpg');
        $music->setAudioName('Wall-of-fame15sec.mp3');
        $music->setDescription('JAM-studios');
        $music->setAuthor("");
        $music->setSlug('wall-of-fame');
        $music->setCategory($this->getReference(CategoryFixtures::POP));
        $manager->persist($music);

        $manager->flush();
    }
}