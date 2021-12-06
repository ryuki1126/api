<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getArticlesJson(){
        $articles = Article::all();
        return $this->jsonResponse($articles);
    }

    public function getArticlejson($id) {
        $article = Article::find($id);
        return $this->jsonResponse($article);
    }
}
