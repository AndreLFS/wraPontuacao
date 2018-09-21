<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('loja'); ?>">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->
            <?php
                //trata o nome para aparecer os 2 primeiros
                //caso n tenha 2 nomes so aparecera o primeiro
                $arr = explode(' ', $cliente->nome );
                if(isset($arr['1'])){
                    $nome = $arr['0'].' '.$arr['1'];
                }else{
                    $nome = $arr['0'];
                }
            ?>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                        <?php echo $nome; ?>
                        <i class="fa fa-caret-down"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <?php echo 'Golds Acumulados: '.$cliente->pontos; ?>
                        </li>
                        <li><a href="<?php echo base_url('loja/informacoes'); ?>"><i class="fa fa-user fa-fw"></i><?php echo $nome; ?></a>
                        </li>
                        <li><a href="<?php echo base_url('loja/senha'); ?>"><i class="fa fa-key fa-fw"></i>Alterar senha</a>
                        </li>
                        <li><a href="<?php echo base_url('loja/pontos'); ?>"><i class="fas fa-chart-line"></i>Minha pontuacao</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('login/logout') ?>"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>

    </div>
    <!-- /#wrapper -->


        <div id = "page-wrapper"class="page-wrapper">
            <?php echo $contents; ?>
        </div>
        <!-- /#page-wrapper -->
     <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
</body>

</html>
