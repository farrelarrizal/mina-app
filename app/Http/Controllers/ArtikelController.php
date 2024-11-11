<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->orderBy('created_at', 'desc')->paginate(10); // Paginate articles with 10 items per page
        $favorite_packages = DB::table('packages')->where('is_favorite', 1)->orderBy('updated_at', 'desc')->get();
        $categoryPackage = DB::table('package_category')->get();
        $package_category = DB::table('package_category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
        
        // Format date for each article
        foreach ($articles as $article) {
            $article->month = date('M', strtotime($article->created_at));
            $article->day = date('d', strtotime($article->created_at));
        }
        
        $data = [
            'title' => 'List Artikel',
            'articles' => $articles,
            'favorite_packages' => $favorite_packages,
            'categoryPackage' => $categoryPackage,
            'package_category' => $package_category
        ];
        
        return view('articles.articles', $data);
    }    
    
    public function show($url)
    {
        $favorite_packages = DB::table('packages')->where('is_favorite', 1)->orderBy('updated_at', 'desc')->get();
        $article = DB::table('articles')->where('url', $url)->first();
        $categoryPackage = DB::table('package_category')->where('is_active', 1)->get();
        $package_category = DB::table('package_category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
        
        $data = [
            'title' => $article->title,
            'favorite_packages' => $favorite_packages,
            'article' => $article,
            'categoryPackage' => $categoryPackage,
            'package_category' => $package_category
        ];
        // dd($data);
        return view('articles.post', $data);
    }
}
