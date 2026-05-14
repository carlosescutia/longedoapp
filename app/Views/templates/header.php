<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url('favicon.png')?>"/>

    <title>Longe do App</title>

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

        .secondary.pointing.menu .visible {
            display: block;
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
<div class="ui left vertical sidebar massive menu">
    <a class="item" href="<?=site_url()?>">
      <i class="home icon"></i>
      Inicio
    </a>
    <?php
        $permisos_requeridos = array(
            'proceso.can_view',
        );
    ?>
    <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
        <a class="item" href="<?=site_url('proceso')?>">
        <i class="block layout icon"></i>
            Proceso
        </a>
    <?php endif ?>
    <?php
        $permisos_requeridos = array(
            'reporte.can_view',
        );
    ?>
    <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
        <a class="item" href="<?=site_url('reportes')?>">
        <i class="file alternate icon"></i>
            Reportes
        </a>
    <?php endif ?>
    <?php
        $permisos_requeridos = array(
            'catalogo.can_view',
        );
    ?>
    <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
        <a class="item" href="<?=site_url('catalogos')?>">
        <i class="wrench icon"></i>
            Catálogos
        </a>
    <?php endif ?>
    <a class="item" href="<?=site_url('perfil')?>">
      <i class="user icon"></i>
        Perfil
    </a>
    <a class="item" href="<?=site_url('logout')?>">
        <i class="sign out alternate icon"></i>
        Salir
    </a>
</div>

<!-- Page Contents -->
<div class="pusher">
<div class="ui vertical center aligned segment">

    <?php
        switch ($userdata['edad']) {
            case 'niño':
                $instrumento = 'pandero';
                break;
            case 'adulto':
                $instrumento = 'berimbau';
                break;
            case 'adulto_mayor':
                $instrumento = 'atabaque';
                break;
            default:
                $instrumento = '';
        }
        $color = 'gris' ;
        if ($userdata['color']) {
            $color = $userdata['color'] ;
        }
        $nombre_archivo = $instrumento . '_' . $color . '.png';
        $up_dir = 'assets/img/avatar/';
        $nombre_archivo_fs = $up_dir . $nombre_archivo;
        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
    ?>
    <div class="ui container barra no-print">
        <div class="ui large secondary pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="header item">
                Longe do App
            </div>
            <div class="ui toc item"><h3>Longe do App</h3></div>
            <div class="ui toc item">
                <div class="ui horizontal list">
                    <div class="item">
                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                            <img class="ui bordered image" src="<?= $nombre_archivo_url ?>" style="height:30px; width:30px">
                        <?php else: ?>
                            <img class="ui bordered image" src="<?= base_url('assets/img/image.png') ?>" style="height:30px; width:30px">
                        <?php endif ?>
                        <div class="content">
                            <?=$userdata['nom_capoeira'] ? $userdata['nom_capoeira'] : $userdata['nom_usuario']?>
                        </div>
                    </div>
                </div>
            </div>
            <a class="item" href="<?=site_url()?>">Inicio</a>
            <?php
                $permisos_requeridos = array(
                    'proceso.can_view',
                );
            ?>
            <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
                <a class="item" href="<?=site_url('proceso')?>">Proceso</a>
            <?php endif ?>
            <?php
                $permisos_requeridos = array(
                    'reporte.can_view',
                );
            ?>
            <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
                <a class="item" href="<?=site_url('reportes')?>">Reportes</a>
            <?php endif ?>
            <?php
                $permisos_requeridos = array(
                    'catalogo.can_view',
                );
            ?>
            <?php if (has_permission_or($permisos_requeridos, $permisos_usuario)): ?>
                <a class="item" href="<?=site_url('catalogos')?>">Catálogos</a>
            <?php endif ?>
            <div class="right menu">
                <div class="item" style="height: 40px;">
                    <a href="<?=site_url('perfil')?>">
                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                            <img class="ui bordered image" src="<?= $nombre_archivo_url ?>" style="height:30px; width:30px">
                        <?php else: ?>
                            <img class="ui bordered image" src="<?= base_url('assets/img/image.png') ?>" style="height:30px; width:30px">
                        <?php endif ?>
                    </a>
                    <span>
                        <a class="item usuario-menu" href="<?=site_url('perfil')?>"><?=$userdata['nom_capoeira'] ? $userdata['nom_capoeira'] : $userdata['nom_usuario']?></a>
                    </span>
                </div>
                <a class="item" href="<?=site_url('logout')?>">Salir</a>
            </div>
        </div>
    </div>

</div>
