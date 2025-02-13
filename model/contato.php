<?php

namespace model;

class contato
{
    /**
     * undocumented function
     *
     * @return void
     */
    public function __construct(private \PDO $pdo){}
    

    public function add(array $ctt): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, email) VALUES (:nome, :email);");
        $stmt->bindValue(':nome', $ctt['nome']);
        $stmt->bindValue(':email', $ctt['email']);
        return $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM contatos WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function update(array $ctt): void
    {
        $stmt = $this->pdo->prepare("UPDATE contatos SET nome = :nome, email = :email WHERE id = :id;");
        $stmt->bindValue(':nome', $ctt['nome']);
        $stmt->bindValue(':email', $ctt['email']);
        $stmt->bindValue(':id', $ctt['id']);
        $stmt->execute();
    }

    public function read(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM contatos;');
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
