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
