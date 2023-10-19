<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
        
        return view('site/home', compact('produtos'));
    }

    public function details($slug) {

        $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
    }

    public function categoria($id) {

        $produtos = Produto::where('id_categoria', $id)->get();

        return view('site.categoria', compact('produtos'));
    }
}

