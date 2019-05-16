<?php

namespace App\Repositories;

use App\Model\Article as Model;

class ArticleRepository extends CoreRepository
{

    /**
     * @return string
     *
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getOneArticle($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getAllArticles()
    {
        return $this->startCondition()->all();
    }
}