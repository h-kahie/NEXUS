<?php

declare(strict_types=1);

final class Goal
{
    public function __construct(private PDO $pdo) {}

    public function all(): array
    {
        return $this->pdo->query(
            "SELECT g.*, a.name AS area_name FROM goals g JOIN areas a ON a.id=g.area_id ORDER BY g.deadline IS NULL, g.deadline"
        )->fetchAll();
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO goals (area_id,title,description,status,progress,deadline) VALUES (:area_id,:title,:description,:status,:progress,:deadline)"
        );
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        $stmt = $this->pdo->prepare(
            "UPDATE goals SET area_id=:area_id,title=:title,description=:description,status=:status,progress=:progress,deadline=:deadline WHERE id=:id"
        );
        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM goals WHERE id=:id');
        return $stmt->execute(['id' => $id]);
    }
}
