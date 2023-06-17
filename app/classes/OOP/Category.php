<?php

namespace App\classes\OOP;

class Category
{
    private string $name;
    private array $products;
    private array $subcategories;

    public function __construct($name)
    {
        $this->name = $name;
        $this->products = [];
        $this->subcategories = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product)
    {
        $index = array_search($product, $this->products);
        if ($index !== false) {
            unset($this->products[$index]);
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function addSubcategory(Category $subcategory)
    {
        $this->subcategories[] = $subcategory;
    }

    public function removeSubcategory(Category $subcategory)
    {
        $index = array_search($subcategory, $this->subcategories);
        if ($index !== false) {
            unset($this->subcategories[$index]);
        }
    }

    public function getSubcategories(): array
    {
        return $this->subcategories;
    }

    public function displayHierarchy($indentation = "")
    {
        echo $indentation . $this->name . "\n";
        foreach ($this->subcategories as $subcategory) {
            $subcategory->displayHierarchy($indentation . "--");
        }
    }

    public function displayProducts()
    {
        echo "Category: " . $this->name . "\n";
        foreach ($this->products as $product) {
            echo "Name: " . $product->getName() . "\n";
            echo "Article Number: " . $product->getArticleNumber() . "\n";
            echo "Prices: " . implode(", ", $product->getPrices()) . "\n";
            echo "Pictures: " . implode(", ", $product->getPictures()) . "\n";
            echo "-------------------------\n";
        }
    }
}