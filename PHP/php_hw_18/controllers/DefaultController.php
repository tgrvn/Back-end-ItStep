<?php

namespace controllers;

use core\Controller;
use models\Product;

class DefaultController extends Controller
{
    public function index()
    {
        $product = new Product();
        $sectors = $product->getSectors();

        return $this->render("index", ["sectors" => $sectors]);
    }

    public function categories()
    {
        $product = new Product();
        $categories = $product->getCategories($_GET["sector"] ?? "");

        return $this->render("categories", ["categories" => $categories]);
    }

    public function products()
    {
        $product = new Product();
        $products = $product->getAllProducts($_GET);

        return $this->render("products", ["products" => $products]);
    }
}
