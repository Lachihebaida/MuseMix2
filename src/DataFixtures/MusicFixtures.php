<?php

namespace App\DataFixtures;

use App\Entity\Music;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MusicFixtures extends Fixture
{
    public const CYBER_NIGHTS_SHORT ='cyber-nights-short';
    public function load(ObjectManager $manager): void
    {
        $music = new Music(); 
        $music->setTitle('Cyber-nights');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('cyber-nights_short15sec.mp3');
        $music->setDescription('Joseph');
        $music->setAuthor("");
        $music->setSlug('cyber-nights');
        $manager->persist($music);
        
        $music = new Music(); 
        $music->setTitle('Exciting-anticipation');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('exciting-anticipation-short15sec.mp3');
        $music->setDescription('Ricky-Bombino');
        $music->setAuthor("");
        $music->setSlug('exciting-anticipation');
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Tomorrow-s-future');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('Deep tech 15sec.mp3');
        $music->setDescription('Sound-and-vision');
        $music->setAuthor("");
        $music->setSlug('tomorrow-s-future');
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('Tomorrow-s-future');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('Deep tech 15sec.mp3');
        $music->setDescription('Sound-and-vision');
        $music->setAuthor("");
        $music->setSlug('tomorrow-s-future');
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('The-sand-is-calling');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('The-sand-is-calling15sec.mp3');
        $music->setDescription('GG-Riggs');
        $music->setAuthor("");
        $music->setSlug('the-sand-is-calling');
        $manager->persist($music);
        
        $music = new Music(); 
        $music->setTitle('OkOkOk');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('okokok15sec.mp3');
        $music->setDescription('Wolves');
        $music->setAuthor("");
        $music->setSlug('okokok');
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('In-to-deep');
        $music->setImageName('pexels-wendy-wei-2350325.jpg');
        $music->setAudioFile('sugar-rush15sec.mp3');
        $music->setDescription('Soulish');
        $music->setAuthor("");
        $music->setSlug('in-to-deep');
        $manager->persist($music);

        $music = new Music(); 
        $music->setTitle('best-of');
        $music->setImageName('carnival-4092632_1920.jpg');
        $music->setAudioFile('best-of-me15sec.mp3');
        $music->setDescription('JAM-studios');
        $music->setAuthor("");
        $music->setSlug('in-to-deep');
        $manager->persist($music);



        $manager->flush();
    }
}
