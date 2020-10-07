<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // Initialisation de Faker
        $faker = Faker\Factory::create('fr_FR');

        // Générer un ensemble de catégories
        for ($i = 0; $i < 5; $i++) {
            $categorie = new Categorie();
            $categorie->setLibelle($faker->word())
                ->setImage($faker->imageUrl(300, 200));
            $reference = 'categorie.' . $i;
            $this->addReference($reference, $categorie);
            $manager->persist($categorie);
        }


        $manager->flush();
    }
}
