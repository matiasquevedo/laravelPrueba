<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesPostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         DB::statement("CREATE VIEW articlespostview AS SELECT articles.id, images.foto, articles.state, articles.title, categories.name, articles.created_at FROM articles, categories, images WHERE state = '1' AND categories.id = articles.category_id AND images.article_id = articles.id ORDER BY id DESC;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
