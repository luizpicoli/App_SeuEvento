@extends('principal')

@section('conteudo')

<script src="{{url('/js/jquery.mask.min.js')}}"></script>

<div class='col-sm-11'>
    <h2> Cadastro de Fotos dos Eventos </h2>
</div>
<div class='col-sm-1'>
    <a href='{{route('eventos.index')}}' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

<form method="post" action="{{route('eventos.storefoto')}}" 
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$reg->id}}">

    <div class='col-sm-9'>
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
    </div>
    <div class="col-sm-3" style="text-align: center">
        @php
        if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
        $foto = '../fotos/'.$reg->id.'.jpg';
        } else {
        $foto = '../fotos/sem_foto.jpg';
        }
        @endphp
        {!!"<img src=$foto id='imagem' height='150' width='200' alt='Foto'>"!!}
        <p>
        <div class="form-group">
            <label for="foto"> Foto </label>
            <input type="file" id="foto" name="foto" 
                   onchange="previewFile()"           
                   class="form-control">
        </div>
        </p>
    </div>
</form>    

<script>
    function previewFile() {
        var preview = document.getElementById('imagem');
        var file = document.getElementById('foto').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    $(document).ready(function () {
        $('#preco').mask("##.###.##0,00", {reverse: true});
    });
</script>

@endsection