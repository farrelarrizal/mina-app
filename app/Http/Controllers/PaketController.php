<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'List Paket Mina Wisata',
        ];

        return view('dashboard.paket.index', $data);
    }

    
}
