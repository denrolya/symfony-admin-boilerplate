<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     */
    public function productList()
    {
        $products = $this
            ->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('app/product/list.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/products/{id}", name="product_view")
     */
    public function productView(Product $product)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $product->setTranslatableLocale('de_DE');
        $em->refresh($product);

        return $this->render('app/product/view.html.twig', [
            'product' => $product
        ]);
    }
}
