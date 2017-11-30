@extends('principal')

@section('conteudo')

<div class='col-sm-11'>
    <h2> Pesquisa de Eventos </h2>
</div>
<div class='col-sm-1'>
    <br>
    <a href='{{route('eventos.pesq')}}' class='btn btn-primary' 
       role='button'> Ver Todos </a>
</div>

<form method="post" action="{{route('eventos.filtro')}}">
    {{ csrf_field() }}

    <div class="col-sm-6">
        <div class="form-group">
            <label for="nome"> Nome do Evento </label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
    </div>

    <div class="col-sm-1">
        <div class="form-group">
            <label> &nbsp; </label>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </div>
</form>

@if (count($eventos)==0)
<div class="col-sm-12">
    <div class="alert alert-success">
        Não há eventos com o filtro definido
    </div>
</div>
@endif

<div class='col-sm-12'>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Local</th>
                <th>Data</th>
                <th>Atração</th>
                <th>Preço R$</th>
                <th>Detalhes</th>
                <th>Data Cad.</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento) 
            <tr>
                <td> {{$evento->id}} </td>
                <td> {{$evento->nome}} </td>
                <td> {{$evento->local}} </td>
                <td> {{$evento->data}} </td>
                <td> {{$evento->atracao}} </td>
                <td style="text-align: right"> {{number_format($evento->preco, 2, ',', '.')}} &nbsp;&nbsp; </td>
                <td> {{date_format($evento->created_at, 'd/m/Y')}} </td>
                <td> {{$evento->detalhes}} </td>
                <td> <a href='{{route('eventos.edit', $evento->id)}}'
                        class='btn btn-info' 
                        role='button'> Alterar </a>
                    <form style="display: inline-block"
                          method="post"
                          action="{{route('eventos.destroy', $evento->id)}}"
                          onsubmit="return confirm('Confirma Exclusão?')">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit"
                                class="btn btn-danger"> Excluir </button>
                    </form>              
                    <a href='{{route('eventos.foto', $evento->id)}}'
                       class='btn btn-warning' 
                       role='button'> Foto </a>                           
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    {{ $eventos->links() }}      
</div>

@endsection