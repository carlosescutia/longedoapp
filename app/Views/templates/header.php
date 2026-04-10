<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url('favicon.png')?>"/>

    <title>phpapp4</title>

    <link href="<?=base_url('assets/css/phpapp4.css')?>" rel="stylesheet"/>

    <!-- jquery -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>

    <!-- semantic-ui -->
    <link href="<?=base_url('assets/css/semantic.min.css')?>" rel="stylesheet"/>
    <script src="<?=base_url('assets/js/semantic.min.js')?>"></script>

    <!-- datatables -->
    <link href="<?=base_url('assets/css/datatables.min.css')?>" rel="stylesheet"/>
    <script src="<?=base_url('assets/js/datatables.min.js')?>"></script>

    <!-- chart.js -->
    <script src="<?=base_url('assets/js/chart.js')?>"></script>
    <script src="<?=base_url('assets/js/chartjs-plugin-datalabels')?>"></script>

    <!-- utils.js -->
    <script src="<?=base_url('assets/js/utils.js')?>"></script>

    <style type="text/css">
        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
        }
    </style>

    <script>
    $(document).ready(function() {
        // create sidebar and attach to menu open
        $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
        ;
        $('.selection.dropdown')
            .dropdown()
        ;
    });
    </script>
</head>
<body>

<!-- Sidebar Menu -->
<div class="ui inverted left vertical sidebar menu">
    <a class="item" href="<?=site_url()?>">
      <i class="home icon"></i>
      Inicio
    </a>
    <?php
        $permisos_requeridos = array(
            'proceso.can_view',
        );
        if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
            <a class="item" href="<?=site_url('proceso')?>">
            <i class="block layout icon"></i>
            Proceso
            </a>
        <?php }
    ?>
    <?php
        $permisos_requeridos = array(
            'reporte.can_view',
        );
        if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
            <a class="item" href="<?=site_url('reportes')?>">
            <i class="file alternate icon"></i>
            Reportes
            </a>
        <?php }
    ?>
    <?php
        $permisos_requeridos = array(
            'catalogo.can_view',
        );
        if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
            <a class="item" href="<?=site_url('catalogos')?>">
            <i class="wrench icon"></i>
            Catálogos
            </a>
        <?php }
    ?>
    <a class="item">
      <i class="user icon"></i>
      <?= $userdata['nom_usuario'] ?>
    </a>
    <a class="item" href="<?=site_url('logout')?>">
        <i class="sign out alternate icon"></i>
        Salir
    </a>
</div>

<!-- Page Contents -->
<div class="pusher">
<div class="ui vertical center aligned segment">

    <div class="ui container barra">
        <div class="ui large secondary pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <h3 class="ui header toc item">PHPapp4</h3>
            <a class="item" href="<?=site_url()?>">Inicio</a>
            <?php
                $permisos_requeridos = array(
                    'proceso.can_view',
                );
                if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
                    <a class="item" href="<?=site_url('proceso')?>">Proceso</a>
                <?php }
            ?>
            <?php
                $permisos_requeridos = array(
                    'reporte.can_view',
                );
                if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
                    <a class="item" href="<?=site_url('reportes')?>">Reportes</a>
                <?php }
            ?>
            <?php
                $permisos_requeridos = array(
                    'catalogo.can_view',
                );
                if (has_permission_or($permisos_requeridos, $permisos_usuario)) { ?>
                    <a class="item" href="<?=site_url('catalogos')?>">Catálogos</a>
                <?php }
            ?>
            <div class="right menu">
                <a class="item usuario-menu" href="#"><i class="circular user icon"></i><?=$userdata['nom_usuario']?></a>
                <a class="item" href="<?=site_url('logout')?>">Salir</a>
            </div>
        </div>
    </div>

</div>
