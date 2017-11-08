<?php
namespace ShopBundle\Service;

use ShopBundle\Entity\Product;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductService
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function saveProduct(Product $product)
    {
        $em = $this->container->get('doctrine')->getManager();
        $em->persist($product);
        $em->flush();
    }

    public function removeProduct(Product $product)
    {
        $em = $this->container->get('doctrine')->getManager();
        $em->remove($product);
        $em->flush();
    }
}
