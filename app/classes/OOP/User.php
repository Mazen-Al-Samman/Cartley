<?php

namespace App\classes\OOP;

use Exception;

class User
{
    private string $name;
    private string $address;
    private array $subscribedProducts;
    private bool $isSeller;
    private array $createdProducts;

    public function __construct($name, $address, $isSeller = false)
    {
        $this->name = $name;
        $this->address = $address;
        $this->subscribedProducts = [];
        $this->isSeller = $isSeller;
        $this->createdProducts = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function isSeller()
    {
        return $this->isSeller;
    }

    public function buyProduct(Product $product)
    {
        echo $this->name . " bought the product: " . $product->getName() . "\n";
    }

    public function subscribeToProduct(Product $product, $event)
    {
        if (!in_array($event, $this->subscribedProducts)) {
            $this->subscribedProducts[$event][] = $product;
        }
    }

    public function unsubscribeFromProduct(Product $product, $event)
    {
        if (isset($this->subscribedProducts[$event])) {
            $index = array_search($product, $this->subscribedProducts[$event]);
            if ($index !== false) {
                unset($this->subscribedProducts[$event][$index]);
            }
        }
    }

    public function getSubscribedProducts($event)
    {
        if (isset($this->subscribedProducts[$event])) {
            return $this->subscribedProducts[$event];
        }
        return [];
    }

    /**
     * @throws Exception
     */
    public function createProduct($name, $articleNumber, $prices, $pictures, $isDigital, $stock, $deliveryMethod): Product
    {
        if (!$this->isSeller) {
            throw new Exception("Only sellers can create products.");
        }

        $product = new Product($name, $articleNumber, $prices, $pictures, $isDigital, $stock, $deliveryMethod);
        $this->createdProducts[] = $product;

        return $product;
    }

    public function getCreatedProducts(): array
    {
        return $this->createdProducts;
    }
}