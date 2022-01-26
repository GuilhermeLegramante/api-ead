<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository 
{
    protected $entity;

    public function __construct(Course $model)
    {
        $this->entity = $model;
    }

    public function all()
    {
        return $this->entity->with('modules.lessons.views')->get();
    }

    public function findById(string $id)
    {
        return $this->entity->with('modules.lessons')->findOrFail($id);
    }
}