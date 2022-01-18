<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository 
{
    protected $entity;

    public function __construct(Lesson $model)
    {
        $this->entity = $model;
    }

    public function all()
    {
        return $this->entity->get();
    }

    public function findById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function getLessonsByModuleId(string $moduleId)
    {
        return $this->entity
            ->where('module_id', $moduleId)
            ->get();
    }
}