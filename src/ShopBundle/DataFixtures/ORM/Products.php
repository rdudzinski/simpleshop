<?php
namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Product;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $description = file_get_contents('http://loripsum.net/api/2/plaintext');
            $product = new Product();
            $product->setName(substr($description, mt_rand(0, 100), mt_rand(10, 30)));
            $product->setPrice(mt_rand(10, 100));
            $product->setDescription($description);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
