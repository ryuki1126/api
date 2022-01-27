<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;

class ArticleEditController extends Controller
{
    public function index() {
        $articles = Article::paginate(5);
        return view('dashboard', [
            'articles' => $articles
        ]);
    }

    public function new() {
        return view('new');
    }

    public function create(Request $request) {
        $article = new Article;
        $article->article_title = $request->input('title');
        $article->article_content = $request->input('content');
        $article->save();

        return redirect('dashboard')->with('status', '新規投稿完了しました');
    }

    public function detail($id) {
        $article = Article::find($id);
        $content = Markdown::parse(e($article->article_content));
        return view('detail', [
            'article' => $article,
            'content' => $content
        ]);
    }

    public function edit($id) {
        $article = Article::find($id);
        return view('edit',[
            'article' => $article
        ]);
    }

    public function update(Request $request) {
        $article = Article::find($request->input('id'));
        $article->article_title = $request->input('title');
        $article->article_content = $request->input('content');
        $article->save();

        return redirect('dashboard')->with('status', '記事を更新しました');
    }

    public function remove($id){
        Article::find($id)->delete();
        return redirect('dashboard')->with('status', '記事を削除しました');
    }
}
