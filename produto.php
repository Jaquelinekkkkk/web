<?php
class Produto {
    public function __construct(
        public string $nome,
        public float $preco,
        public int $estoque,
        public ?int $id = null
    ){}

    public function valorEmEstoque(): float {
        return $this->preco * $this->estoque;
    }

    public function estoqueBaixo(): bool {
        return $this->estoque < 5;
    }
}
