<?php
namespace ShopBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use ShopBundle\Entity\Product;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductListener
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->run($args);
    }

    private function run(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Product) {
            $shopMailer = $this->container->get('shop.new_product_message');
            $shopMailer->sendMail();
        }
    }
}
