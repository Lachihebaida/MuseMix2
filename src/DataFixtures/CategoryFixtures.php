<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const POP  = 'pop';
    public const TECH_HOUSE  = 'tech-house';
    public const POP_DANSE  = 'pop-danse';
    public const BLUES  = 'blues ';
    public const COUNTRY_ROCK  = 'country-rock';
    public const NU_DISCO  = 'nu-disco';


    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Pop');
        // $category->setImageName("");
        $category->setSlug('pop');
        $manager->persist($category);
        $this->addReference(self::POP, $category);

        $category = new Category();
        $category->setName('Tech-house');
        // $category->setImageName("");
        $category->setSlug('tech-house');
        $manager->persist($category);
        $this->addReference(self::TECH_HOUSE, $category);

        $category = new Category();
        $category->setName('Pop-danse');
        // $category->setImageName("");
        $category->setSlug('pop-danse');
        $manager->persist($category);
        $this->addReference(self::POP_DANSE, $category);
        
        $category = new Category();
        $category->setName('Blues');
        // $category->setImageName("");
        $category->setSlug('blues');
        $manager->persist($category);
        $this->addReference(self::BLUES, $category);


        $category = new Category();
        $category->setName('Country-rock');
        // $category->setImageName("");
        $category->setSlug('country-rock');
        $manager->persist($category);
        $this->addReference(self::COUNTRY_ROCK, $category);


        $category = new Category();
        $category->setName('Nu-disco');
        // $category->setImageName("");
        $category->setSlug('nu-disco');
        $manager->persist($category);
        $this->addReference(self::NU_DISCO, $category);

        $manager->flush();
    }
}
