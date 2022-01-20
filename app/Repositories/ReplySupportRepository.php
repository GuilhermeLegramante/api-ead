<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository
{
    use RepositoryTrait;

    protected $entity;

    public function __construct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function all(array $filters = [])
    {
        return $this->getUserAuth()
            ->supports()
            ->where(function ($query) use ($filters) {
                if (isset($filters['lesson'])) {
                    $query->where('lesson_id', $filters['lesson']);
                }

                if (isset($filters['status'])) {
                    $query->where('status', $filters['status']);
                }

                if (isset($filters['filter'])) {
                    $filter = $filters['filter'];
                    $query->where('description', 'LIKE', "'%{$filter}%");
                }
            })
            ->orderBy('updated_at')
            ->get();
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function store(array $data)
    {
        $user = $this->getUserAuth();

        $reply = $this->entity
            ->create([
                'support_id' => $data['support'],
                'description' => $data['description'],
                'user_id' => $user->id,
            ]);

        return $reply;
    }

}
