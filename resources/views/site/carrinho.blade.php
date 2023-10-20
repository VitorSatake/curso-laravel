@extends('site/layout')
@section('title', 'Carrinho')

@section('conteudo')


<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
         
    
    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>

    @endif

    <h5> Seu Carrinho possui {{$itens->count()}} produtos.</h5>

    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
          <tr>
            <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
            <td>{{$item->name}}</td>
            <td>R$ {{ number_format($item->price, 2, ',', '.')}}</td>

            {{--BTN ATUALIZAR--}}
            <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype=",ultipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <td><input style="width: 40px; font-weight:900;" class="white center" type="number" name="quantity" value="{{$item->quantity}}"></td>
            <td><button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
            </form>

            {{--BTN REMOVER--}}
            <form action="{{route('site.removecarrinho')}}" method="POST" enctype=",ultipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <td><button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td>
            </form>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="row container center">
        <button class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></button>
        <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>

      </div>
  
<div>

@endsection



