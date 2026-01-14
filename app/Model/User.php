<?php
namespace App\Model;

use JsonSerializable;

class User implements JsonSerializable {
    public int $id;
    public string $nickname;
    public int $total_score;

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->nickname = $data['nickname'] ?? '';
        $this->total_score = (int)($data['total_score'] ?? 0);
    }

    public function jsonSerialize(): mixed {
        return ['id' => $this->id, 'nickname' => $this->nickname, 'total_score' => $this->total_score];
    }
}