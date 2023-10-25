<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
        
        return view('site/home', compact('produtos'));
    }

    public function details($slug) {

        $produto = Produto::where('slug', $slug)->first();

        //Gate::authorize('ver-produto', $produto); //autorização para ver os detalhes
        //$this->authorize('verProduto', $produto); //autorização para ver os detalhes

        if(Gate::allows('ver-produto', $produto)) { //permite
           return view('site.details', compact('produto'));
        }

        //if(Gate::denies('ver-produto', $produto)) { // proibe e redireciona para o index
        //    return redirect()->route('site.index');
       // }

        
    }

    public function categoria($id) {

        $categoria = Categoria::find($id);

        $produtos = Produto::where('id_categoria', $id)->paginate(3);

        return view('site.categoria', compact('produtos', 'categoria'));
    }
}

