@extends('principal')

@section('conteudo')

<script src="{{url('/js/jquery.mask.min.js')}}"></script>

<div class='col-sm-11'>
@if ($acao == 1)
    <h2> Inclusão de Eventos </h2>
@else 
    <h2> Alteração de Eventos </h2>
@endif
</div>
<div class='col-sm-1'>
    <a href='{{route('eventos.index')}}' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

<div class="col-sm-12">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    
</div>


<div class='col-sm-12'>
@if ($acao == 1)
    <form method="post" action="{{route('eventos.store')}}">
@else 
    <form method="post" action="{{route('eventos.update', $reg->id)}}">
        {!! method_field('put') !!}
@endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome do Eventos:</label>
            <input type="text" class="form-control" id="nome" 
                   name="nome" 
                   value="{{$reg->nome or old('nome')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="local">Local:</label>
            <input type="text" class="form-control" id="local" 
                   name="local" 
                   value="{{$reg->local or old('local')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="text" class="form-control" id="data" 
                   name="data" 
                   value="{{$reg->data or old('data')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="preco">Preço R$:</label>
            <input type="text" class="form-control" id="preco" 
                   name="preco" 
                   value="{{$reg->preco or old('preco')}}"                   
                   required>
        </div>
        
        <div class="form-group">
            <label for="atracao">Atração:</label>
            <input type="text" class="form-control" id="atracao" 
                   name="atracao" 
                   value="{{$reg->atracao or old('atracao')}}"                   
                   required>
        </div>
        
        <div class="form-group">
            <label for="detalhes">Detalhes:</label>
            <input type="text" class="form-control" id="detalhes" 
                   name="detalhes" 
                   value="{{$reg->detalhes or old('detalhes')}}"                   
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>    
</div>

<script>
$(document).ready(function() {
   $('#preco').mask("##.###.##0,00", {reverse: true}); 
});    
</script>

@endsection