<?php
namespace ShopBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class NewProductMessage
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function sendMail()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('New product created!')
            ->setFrom('fake@example.com')
            ->setTo('fake@example.com')
            ->addPart(
                'New product has been created!'
            );

        return $this->container->get('mailer')->send($message) ? true : false;
    }
}
