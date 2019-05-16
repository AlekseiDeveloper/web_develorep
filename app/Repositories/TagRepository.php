<?php

namespace App\Repositories;

use App\Model\Tag as Model;

class TagRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getOneTag($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getAllTags()
    {
        return $this->startCondition()->all();
    }
}