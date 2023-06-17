<?php

namespace App\classes\OOP;

use http\Exception\InvalidArgumentException;

class ShoppingCart
{
    private array $products = [];

    public function addProduct(Product $product, int $quantity = 1)
    {
        if ($quantity < 1) throw new InvalidArgumentException("Quantity Should be greater than or equal 1");
        $productArticleNumber = $product->getArticleNumber();

        if (isset($this->products[$productArticleNumber])) {
            $this->products[$productArticleNumber]['quantity'] += $quantity;
            return;
        }

        $this->products[$productArticleNumber] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    public function removeProduct(string $articleNumber)
    {
        if (!isset($this->products[$articleNumber])) return;
        unset($this->products[$articleNumber]);
    }

    public function displayCart()
    {
        if (empty($this->products)) {
            echo "The shopping cart is empty.";
            return;
        }

        echo "Shopping Cart Contents:\n";
        foreach ($this->products as $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];
            $totalPrice = $product->getPriceByQuantity($quantity);

            echo "Name: " . $product->getName() . "\n";
            echo "Article Number: " . $product->getArticleNumber() . "\n";
            echo "Quantity: " . $quantity . "\n";
            echo "Price for Quantity: $" . $totalPrice . "\n";
            echo "-------------------------\n";
        }

        echo "Total Price: $" . $this->calculateTotalPrice() . "\n";
    }

    public function calculateTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $productArray) {
            $product = $productArray['product'];
            $quantity = $productArray['quantity'];
            $totalPrice += $product->getPriceByQuantity($quantity) * $quantity;
        }

        return $totalPrice;
    }

    public function purchase()
    {
        $totalPrice = $this->calculateTotalPrice();
        echo "Purchasing the shopping cart for $" . $totalPrice . ".\n";
        $this->clearCart();
    }

    public function clearCart()
    {
        $this->products = [];
    }
}