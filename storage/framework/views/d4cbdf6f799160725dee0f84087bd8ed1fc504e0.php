<!DOCTYPE html>
<html lang="en">
    <head>
        <title> App SeuEvento </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Área Administrativa</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastros <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('eventos.index')); ?>">Eventos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pesquisas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('eventos.pesq')); ?>">Eventos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gráficos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('eventos.graf')); ?>">Eventos</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo e(Auth::user()->name); ?> </a></li>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-in"></span> Sair
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>                        
                    </li>
                </ul>      
            </div>
        </nav>

        <div class="container">

            <?php echo $__env->yieldContent('conteudo'); ?>

        </div>

    </body>
</html>
