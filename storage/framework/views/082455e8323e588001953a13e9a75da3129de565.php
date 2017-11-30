<?php $__env->startSection('conteudo'); ?>

<script src="<?php echo e(url('/js/jquery.mask.min.js')); ?>"></script>

<div class='col-sm-11'>
    <h2> Cadastro de Fotos dos Eventos </h2>
</div>
<div class='col-sm-1'>
    <a href='<?php echo e(route('eventos.index')); ?>' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

<form method="post" action="<?php echo e(route('eventos.storefoto')); ?>" 
      enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="id" value="<?php echo e($reg->id); ?>">

    <div class='col-sm-9'>
        <div class="form-group">
            <label for="nome">Nome do Eventos:</label>
            <input type="text" class="form-control" id="nome" 
                   name="nome" 
                   value="<?php echo e(isset($reg->nome) ? $reg->nome : old('nome')); ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="local">Local:</label>
            <input type="text" class="form-control" id="local" 
                   name="local" 
                   value="<?php echo e(isset($reg->local) ? $reg->local : old('local')); ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="text" class="form-control" id="data" 
                   name="data" 
                   value="<?php echo e(isset($reg->data) ? $reg->data : old('data')); ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="preco">Preço R$:</label>
            <input type="text" class="form-control" id="preco" 
                   name="preco" 
                   value="<?php echo e(isset($reg->preco) ? $reg->preco : old('preco')); ?>"                   
                   required>
        </div>

        <div class="form-group">
            <label for="atracao">Atração:</label>
            <input type="text" class="form-control" id="atracao" 
                   name="atracao" 
                   value="<?php echo e(isset($reg->atracao) ? $reg->atracao : old('atracao')); ?>"                   
                   required>
        </div>

        <div class="form-group">
            <label for="detalhes">Detalhes:</label>
            <input type="text" class="form-control" id="detalhes" 
                   name="detalhes" 
                   value="<?php echo e(isset($reg->detalhes) ? $reg->detalhes : old('detalhes')); ?>"                   
                   required>
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    <div class="col-sm-3" style="text-align: center">
        <?php 
        if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
        $foto = '../fotos/'.$reg->id.'.jpg';
        } else {
        $foto = '../fotos/sem_foto.jpg';
        }
         ?>
        <?php echo "<img src=$foto id='imagem' height='150' width='200' alt='Foto'>"; ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>