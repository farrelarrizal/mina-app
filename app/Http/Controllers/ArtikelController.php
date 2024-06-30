<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->get();
        $favorite_packages = DB::table('packages')->where('is_favorite', 1)->orderBy('updated_at', 'desc')->get();
        $categoryPackage = DB::table('package_category')->get();

        // date format in 3 character month
        foreach ($articles as $article) {
            $article->month = date('M', strtotime($article->created_at));
            $article->day = date('d', strtotime($article->created_at));
        }

        $data = [
            'title' => 'List Artikel',
            'articles' => $articles,
            'favorite_packages' => $favorite_packages,
            'categoryPackage' => $categoryPackage
        ];
        // dd($data);

        return view('articles.articles', $data);
    }

    public function show($url)
    {
        $article = DB::table('articles')->where('url', $url)->first();
        $categoryPackage = DB::table('package_category')->where('is_active', 1)->get();
        $data = [
            'title' => $article->title,
            'article' => $article,
            'categoryPackage' => $categoryPackage,
        ];
        // dd($data);
        return view('articles.post', ['data' => $data]);
    }
}
