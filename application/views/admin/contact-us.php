<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Nexus Progress - Track your Nexus Weapon progress from FFXIV online!">
        <meta name="author" content="Nexus Progress">
        <meta name="keywords" content="nexus, progress, ffxiv, weapon, relic, xiv, finalfantasy, ff">

        <title><?php echo $title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url() ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url() ?>">Nexus Progress</a>
                    <a class="navbar-brand" href="<?php echo base_url('admin/about') ?>">About</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= '@' . $this->session->userdata('username') ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url('admin/editProfile') ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/contactUs') ?>"><i class="fa fa-fw fa-envelope"></i> Error Report</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li  class="active">
                            <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-fw fa-dashboard"></i> Progress</a>
                        </li>
                        <!--                        <li>
                                                    <a href="<?= base_url('admin/charts') ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                                                </li>-->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (isset($success)) { ?>
                                <p class="bg-success" align="center"><?php echo $success ?></p>
                            <?php } if (isset($danger)) { ?>
                                <p class="bg-danger" align="center"><?php echo $danger ?></p>
                            <?php } ?>
                            <h1 class="page-header">
                                Contact Us
                            </h1>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Us</h3>
                                </div>
                                <!-- Panel 1 -->
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/contactUs') ?>">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $this->session->userdata('email') ?>" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
              