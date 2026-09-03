<?php
class ProdutoDAO {
    public function __construct(private PDO $pdo) {}

    public function inserir(Produto $p): int {
        $sql = "INSERT INTO produto (nome, preco, estoque) VALUES (?,?,?)";
        $st = $this->pdo->prepare($sql);
        $st->execute([$p->nome, $p->preco, $p->estoque]);
        return (int)$this->pdo->lastInsertId();
    }

    public function listarTodos(): array {
        $st = $this->pdo->query("SELECT * FROM produto ORDER BY nome");
        $lista = [];
        foreach ($st->fetchAll(PDO::FETCH_ASSOC) as $l) {
            $lista[] = new Produto($l['nome'], (float)$l['preco'], (int)$l['estoque'], (int)$l['id']);
        }
        return $lista;
    }

    // Exercício 2.1
    public function buscarPorNome(string $termo): array {
        $st = $this->pdo->prepare("SELECT * FROM produto WHERE nome LIKE ?");
        $st->execute(["%$termo%"]);
        $lista = [];
        foreach ($st->fetchAll(PDO::FETCH_ASSOC) as $l) {
            $lista[] = new Produto($l['nome'], (float)$l['preco'], (int)$l['estoque'], (int)$l['id']);
        }
        return $lista;
    }

    // Exercício 2.2
    public function buscarPorId(int $id): ?Produto {
        $st = $this->pdo->prepare("SELECT * FROM produto WHERE id = ?");
        $st->execute([$id]);
        $l = $st->fetch(PDO::FETCH_ASSOC);
        if (!$l) {
            return null;
        }
        return new Produto($l['nome'], (float)$l['preco'], (int)$l['estoque'], (int)$l['id']);
    }

    // Exercício 2.3
    public function atualizar(Produto $p): void {
        $sql = "UPDATE produto SET nome = ?, preco = ?, estoque = ? WHERE id = ?";
        $st = $this->pdo->prepare($sql);
        $st->execute([$p->nome, $p->preco, $p->estoque, $p->id]);
    }

    // Exercício 2.3
    public function excluir(int $id): void {
        $st = $this->pdo->prepare("DELETE FROM produto WHERE id = ?");
        $st->execute([$id]);
    }
}
