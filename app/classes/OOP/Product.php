<?php

namespace App\classes\OOP;

class Product
{
    private string $name;
    private int $articleNumber;
    private array $prices;
    private array $pictures;
    private string $type;
    private int $stock;
    private ?string $method;

    const TYPE_NORMAL = 'normal';
    const TYPE_DIGITAL = 'digital';
    const METHOD_EMAIL = 'email';
    const METHOD_LINK = 'link';

    public function __construct($name, $articleNumber, $prices, $pictures, $type, $stock = 0, $method = null)
    {
        $this->name = $name;
        $this->articleNumber = $articleNumber;
        $this->prices = $prices;
        $this->setPictures($pictures);
        $this->type = $type;
        $this->stock = $stock;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getArticleNumber(): int
    {
        return $this->articleNumber;
    }

    /**
     * @return array
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @return array
     */
    public function getPictures(): array
    {
        return $this->pictures;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    private function setPictures(array $pictures)
    {
        if (count($pictures) > 5) {
            throw new \Error("Error: You can't add more than 5 Pictures.");
        }

        $this->pictures = $pictures;
    }

    public function sendProduct()
    {
        switch ($this->type) {
            case self::TYPE_NORMAL:
                $this->sendNormalProduct();
                break;
            case self::TYPE_DIGITAL:
                $this->sendDigitalProduct();
                break;
        }
    }

    private function sendNormalProduct()
    {
        // send product by post logic here...
        $this->stock--;
    }

    /**
     * @return void
     */
    private function sendDigitalProduct(): void
    {
        if ($this->method === self::METHOD_LINK) {
            $link = $this->generateDownloadLink();
            // Send Link logic here ...

            return;
        }

        $this->sendEmail();
    }

    public function generateDownloadLink(): ?string
    {
        if ($this->type !== self::TYPE_DIGITAL) return null;
        return "https://cartley-download/$this->articleNumber";
    }

    public function sendEmail(): bool
    {
        // $this->emailHelper->send() ...
        echo "Email Sent Successfully.";
        return true;
    }

    public function getPriceByQuantity(int $quantity)
    {
        return $this->prices[$quantity - 1] ?? $this->prices[0];
    }
}