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


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Nexus Progress</a>
                <a class="navbar-brand" href="<?php echo base_url('admin/about') ?>">About</a>
            </div>
            
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
                            Nexus Progress
                        </h1>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Login</h3>
                            </div>
                            <!-- Panel 1 -->
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url('admin/login') ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Username" name="username" maxlength="20" required="required">
                                </div><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" maxlength="10" name="password" placeholder="Password" required>
                                </div>
                                <button style="float: right" type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Register</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url('admin/registerUser') ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" name="username" maxlength="20" placeholder="Username" required="required">
                                </div><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" maxlength="10" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" maxlength="100" name="email" placeholder="E-mail" required>
                                    <small style="float: right">only used for password recovery</small><br>
                                </div>
                                <button style="float: right" type="submit" class="btn btn-success">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Password Recovery</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url('admin/passwordRecovery') ?>">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" maxlength="100" placeholder="Type your e-mail" required>
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
        <script src="js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
