<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @param ProductRepository $productRepository
     * @return Response
     * @Route("/index")
     */
    public function index(ProductRepository $productRepository)
    {
        $product = new Product();
        $product->setName('test');

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        $product = $productRepository->find(1);

        return new Response($product->getName());
    }
}
