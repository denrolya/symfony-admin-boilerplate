<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/products/new", name="product_create")
     */
    public function productCreate(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            die(var_dump($form->getData()));
        }

        return $this->render('app/product/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/products/{id}", name="product_view")
     */
    public function productView(Product $product)
    {
        return $this->render('app/product/view.html.twig', [
            'product' => $product
        ]);
    }
}
