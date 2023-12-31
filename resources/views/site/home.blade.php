@extends('site/layout')
@section('title', 'Essa é a pagina Home')

@section('conteudo')


<div class="row container">

    @foreach ($produtos as $produto)
    <div class="col s12 m3"> 
        <div class="card">
            <div class="card-image">
            <img src="{{ $produto->imagem }}">
          
            {{--@can('verProduto', $produto)--}}
            <a href="{{ route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            {{--@endcan--}}
            </div>
            <div class="card-content">
            <span class="card-title">{{ $produto->nome }}</span>
            <p>{{ Str::limit($produto->descricao, 20) }}</p>
        </div>
        </div>
        </div>

    @endforeach
    <div>

    <div class="row center">
        {{ $produtos->links('custom/pagination') }}
    </div>
    

</div>
    
































    {{--Isso é um comentario--}} 

    {{-- isset($nome) ? 'existe' : 'não existe' operador ternario--}}

    {{-- $teste ?? 'valor padrao' se nao existir a variavel, atribui o valor padrao--}}

    {{--Estrutura de controle--}}

    {{-- @if ($nome == 'rodrigox')
        true
    @else
        false
    @endif
        
    @unless ($nome == 'rodrigox') {{--contraio do if, imprime true se a condição for falsa
    true
    @else
        false
    @endunless

    @switch($idade)
        @case(28)
            idade está ok
            @break
        @case(29)
            idade está errada
            @break
        @default
            default
    @endswitch

    @isset($nome) {{--se existe a variavel nome
        existe
    @endisset

    @empty($nome) {{--se a variavel nome está vazia
        esta vazia
    @endempty

    @auth {{--verifica se o usuario está autenticado
        está autenticado
    @endauth

    {{-- @guest {{--retorn true se o usuario nao está autenticado
        nao está autenticado
    @endguest  --}}

    {{--Estruturas de repetição--}} 

    
    {{-- @for ($i = 0; $i <= 10; $i++)
        valor atual é {{ $i }} <br>
    @endfor

    @php
        $i = 0;
    @endphp

    @while ($i <= 10)
    valor atual com while é {{ $i }} <br>
    @php
        $i++;
    @endphp
    @endwhile

    @forelse ($frutas as $fruta) forelsa trabalha com valores vazios, caso estejam --}}
        {{-- {{ $fruta }} <br>
    @empty
        array está vazio
    @endforelse

    @include('includes.mensagem', ['titulo' => 'Mensagem de sucesso !'])

    @component('components.sidebar')
        @slot('paragrafo')
            Texto qualquer vindo do slot
        @endslot
    @endcomponent --}}

    {{-- @push('style')
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    @endpush

    @push('script')
        <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @endpush --}}

@endsection



