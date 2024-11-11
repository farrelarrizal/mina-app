<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    //
    public function index()
    {
        $packages = DB::table('packages')->orderBy('created_at', 'desc')->get();
        $package_category = DB::table('package_category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();



        $data = [
            'title' => 'List Paket',
            'packages' => $packages,
            'package_category' => $package_category
        ];

        return view('landing.package', $data);
    }

    public function show($url)
    {
        // dd($url);
        $package = DB::table('packages')
            ->join('package_detail', 'packages.slug', '=', 'package_detail.slug')
            ->join('package_category', 'packages.category_id', '=', 'package_category.id')
            ->where('packages.slug', $url)->first();

        $popular_packages = DB::table('packages')->where('is_favorite', 1)->orderBy('updated_at', 'desc')->get();
        $package_category = DB::table('package_category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();

        $data = [
            'title' => $package->package_name,
            'package' => $package,
            'package_category' => $package_category,
            'popular_packages' => $popular_packages,
            // 'categoryPackage' => $categoryPackage,
        ];
        return view('landing.package-detail', $data);
    }
}
