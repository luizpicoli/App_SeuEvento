<?php $__env->startSection('conteudo'); ?>

<script src="<?php echo e(url('/js/jquery.mask.min.js')); ?>"></script>

<div class='col-sm-11'>
<?php if($acao == 1): ?>
    <h2> Inclusão de Eventos </h2>
<?php else: ?> 
    <h2> Alteração de Eventos </h2>
<?php endif; ?>
</div>
<div class='col-sm-1'>
    <a href='<?php echo e(route('eventos.index')); ?>' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

<div class="col-sm-12">
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>    
</div>


<div class='col-sm-12'>
<?php if($acao == 1): ?>
    <form method="post" action="<?php echo e(route('eventos.store')); ?>">
<?php else: ?> 
    <form method="post" action="<?php echo e(route('eventos.update', $reg->id)); ?>">
        <?php echo method_field('put'); ?>

<?php endif; ?>
        <?php echo e(csrf_field()); ?>

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
    </form>    
</div>

<script>
$(document).ready(function() {
   $('#preco').mask("##.###.##0,00", {reverse: true}); 
});    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>