<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get();

        return view('articles.articles', [
            'articles' => $articles
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'text' => 'required',
            'thumbnail' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('thumbnail')) {
            $filename = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->storeAs('img', $filename,'public');
        }

        $request->user()->articles()->create([
            'title' => $request->title,
            'text' => $request->text,
            'thumbnail' => $filename
        ]);

        return redirect()->route('articles');
    }

    public function destroy(Article $article) {
        $article->delete();

        return redirect()->route('articles');
    }

    public function update(Request $request) {
        $article = Article::find($request->id);

        $article->update($request->all());

        return response()->json($article);
    }

    public function articleById($id) {
        $article = Article::find($id);

        return response()->json($article);
    }
}
