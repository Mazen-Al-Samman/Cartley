<?php

namespace App\Controllers;

use App\classes\BinaryTree;
use App\classes\Factorial;
use App\classes\OOP\Category;
use App\classes\OOP\Product;
use App\classes\OOP\ShoppingCart;

class Cartley extends BaseController
{
    /**
     * @param int $number
     * @return string
     */
    public function factorial(int $number): string
    {
        return view('cartley/factorial_view', [
            'number' => $number,
            'title' => 'Factorial',
            'factorial' => Factorial::calculateFactorial($number),
        ]);
    }

    /**
     * @param string $textTree
     * @return string
     */
    public function binaryTree(string $textTree): string
    {
        return view('cartley/tree_view', [
            'tree' => $textTree,
            'title' => 'Binary Tree',
            'binaryStatus' => BinaryTree::checkBinaryTree($textTree),
            'formattedTree' => BinaryTree::getFormattedTree($textTree),
        ]);
    }

    public function OOP()
    {
        // Products
        $samsungMobile = new Product(
            'Samsung Note 10',
            '65323344',
            [1000, 900, 800],
            ['https://samsung-note10.png'],
            Product::TYPE_NORMAL, 10);

        $beinSport = new Product(
            'Bein Sport',
            '24673453',
            [20, 18],
            ['https://bein-logo.png'],
            Product::TYPE_DIGITAL
        );

        // Category
        $category = new Category('Mobiles & Tablets');
        $category->addProduct($samsungMobile);

        // SubCategory
        $mobilesSubCategory = new Category('Mobiles');
        $category->addSubcategory($mobilesSubCategory);

        // Shopping Cart
        $shoppingCart = new ShoppingCart();
        $shoppingCart->addProduct($samsungMobile, 3);
        $shoppingCart->addProduct($beinSport);
        $shoppingCart->removeProduct($beinSport->getArticleNumber());
        $shoppingCart->displayCart();
        $shoppingCart->purchase();
    }
}