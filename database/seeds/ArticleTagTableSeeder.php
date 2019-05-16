<?php

use Illuminate\Database\Seeder;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ArticleRepository $articleRepository, TagRepository $tagRepository)
    {
        for ($i=1; $i <= 4; $i++){

            $article = $articleRepository->getOneArticle($i);
            $tag = $tagRepository->getOneTag($i);
            $article->tags()->attach($tag);

        }
    }
}
