<?php $__env->startSection('conteudo'); ?>

<div class='col-sm-11'>
    <h2> Pesquisa de Eventos </h2>
</div>
<div class='col-sm-1'>
    <br>
    <a href='<?php echo e(route('eventos.pesq')); ?>' class='btn btn-primary' 
       role='button'> Ver Todos </a>
</div>

<form method="post" action="<?php echo e(route('eventos.filtro')); ?>">
    <?php echo e(csrf_field()); ?>


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

<?php if(count($eventos)==0): ?>
<div class="col-sm-12">
    <div class="alert alert-success">
        Não há eventos com o filtro definido
    </div>
</div>
<?php endif; ?>

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
            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td> <?php echo e($evento->id); ?> </td>
                <td> <?php echo e($evento->nome); ?> </td>
                <td> <?php echo e($evento->local); ?> </td>
                <td> <?php echo e($evento->data); ?> </td>
                <td> <?php echo e($evento->atracao); ?> </td>
                <td style="text-align: right"> <?php echo e(number_format($evento->preco, 2, ',', '.')); ?> &nbsp;&nbsp; </td>
                <td> <?php echo e(date_format($evento->created_at, 'd/m/Y')); ?> </td>
                <td> <?php echo e($evento->detalhes); ?> </td>
                <td> <a href='<?php echo e(route('eventos.edit', $evento->id)); ?>'
                        class='btn btn-info' 
                        role='button'> Alterar </a>
                    <form style="display: inline-block"
                          method="post"
                          action="<?php echo e(route('eventos.destroy', $evento->id)); ?>"
                          onsubmit="return confirm('Confirma Exclusão?')">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                        <button type="submit"
                                class="btn btn-danger"> Excluir </button>
                    </form>              
                    <a href='<?php echo e(route('eventos.foto', $evento->id)); ?>'
                       class='btn btn-warning' 
                       role='button'> Foto </a>                           
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>    
    <?php echo e($eventos->links()); ?>      
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>