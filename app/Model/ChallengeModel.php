<?php
namespace App\Model;
use JsonSerializable;

class Challenge implements JsonSerializable {
    public int $id;
    public string $title;
    public string $description;
    public int $points;
    public string $category;
    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->title = $data['title'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->points = (int)($data['points'] ?? 0);
        $this->category = $data['category'] ?? '';
    }
    public function jsonSerialize(): mixed {
        return ['id' => $this->id, 'title' => $this->title, 'description' => $this->description, 'points' => $this->points, 'category' => $this->category];
    }
}