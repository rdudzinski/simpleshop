<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ShopBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $productsQuery = $em->getRepository('ShopBundle:Product')->findAllQuery();

        $paginator  = $this->get('knp_paginator');
        $products = $paginator->paginate(
            $productsQuery,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('@App/Default/index.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     *
     * @Route("/{id}", name="homepage_product_show")
     * @Method("GET")
     */
    public function productAction(Product $product)
    {
        return $this->render('@App/Default/product.html.twig', array(
            'product' => $product
        ));
    }
}
