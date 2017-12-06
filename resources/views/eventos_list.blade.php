@extends('principal')

@section('conteudo')

<div class='col-sm-11'>
    <h2> Cadastro de Eventos </h2>
</div>
<div class='col-sm-1'>
    <a href='{{route('eventos.create')}}' class='btn btn-primary' 
       role='button'> Novo </a>
</div>

@if (session('status'))
<div class="col-sm-12">
    <div class="alert alert-success">
        {{ session('status') }}
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