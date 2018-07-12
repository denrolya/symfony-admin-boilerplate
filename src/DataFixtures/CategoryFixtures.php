<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    private $categories = [
        'Dress',
        'Top'
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);

            $manager->persist($category);
            unset($category);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
