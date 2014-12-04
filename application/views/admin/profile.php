<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

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
                        <?php if(isset($success)){ ?>
                <p class="bg-success" align="center"><?php echo $success ?></p>
            <?php } if(isset($danger)){ ?>
                <p class="bg-danger" align="center"><?php echo $danger ?></p>
            <?php } ?>
                        <h1 class="page-header">
                            Profile
                        </h1>
                    </div>
                     <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Profile</h3>
                            </div>
                            <!-- Panel 1 -->
                            <div class="panel-body">
                                <form method="post" id="editProfile" action="<?php echo base_url('admin/editProfile') ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Username" name="username" maxlength="20" required="required" value="<?php echo $this->session->userdata('username'); ?>">
                                </div><br>
                                <div class="form-group">
                                    <input type="email" class="form-control" maxlength="80" name="email" placeholder="E-mail" required value="<?php echo $this->session->userdata('email'); ?>">
                                </div>
                                <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div  style="float: right" class="col-lg-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Password</h3>
                            </div>
                            <!-- Panel 1 -->
                            <div class="panel-body">
                                <form method="post" id="changePassword" action="<?php echo base_url('admin/editPassword') ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control" maxlength="10" id="inputPassword" name="new_password" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="match_password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                                </div>
                                <button style="float: right" type="submit" class="btn btn-warning">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- /#wrapper -->

        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url() ?>/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>/js/bootstrap.min.js"></script>

    </body>

</html>
