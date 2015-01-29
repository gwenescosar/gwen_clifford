<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

/**
 * Class LoadItemData
 */
class LoadCategoryData extends AbstractFixture
{
    /**
     * {@inheritDoc} Create and load category fixtures to database
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $keys = (new Category())
            ->setTitle("Ключі");
        $manager->persist($keys);

        $toy = (new Category())
            ->setTitle("Іграшка");
        $manager->persist($toy);

        $item = (new Category())
            ->setTitle("Предмет");
        $manager->persist($item);

        for ($i = 0; $i < 100; $i++) {
            $randomItem = (new Category())
                ->setTitle("Random category №" . rand(0, 100));
            $manager->persist($randomItem);
        }

        $manager->flush();
    }
}