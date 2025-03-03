<?php

namespace FakeBusiness\Classes;

class Item {
    public string $name;
    public float $price;
    public string $description;

    public function __construct(string $name, float $price, string $description) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getItemDetails(): string {
        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description
        ];
        return json_encode($data);
    }
}
