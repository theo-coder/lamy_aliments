<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AlimentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('fr_FR');

        // Générer un ensemble de catégories
        for ($i = 0; $i < 50; $i++) {

            // Générer une référence de catégorie de manière aléatoire
            $categorieReference = sprintf('categorie.%d', $faker->numberBetween(0, 4));

            $aliment = new Aliment();
            $aliment->setNom($faker->word())
                ->setPrix($faker->randomFloat(2, 0, 100))
                ->setImage($faker->imageUrl(300, 200))
                ->setCalorie($faker->randomNumber(3))
                ->setProteine($faker->randomFloat(2, 0, 800))
                ->setGlucide($faker->randomFloat(2, 0, 800))
                ->setLipide($faker->randomFloat(2, 0, 800))
                ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                ->setCategorie($this->getReference($categorieReference));

            $manager->persist($aliment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategorieFixtures::class
        ];
    }
}
