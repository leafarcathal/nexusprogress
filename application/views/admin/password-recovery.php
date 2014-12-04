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
                            <?php if (isset($success)) { ?>
                                <p class="bg-success" align="center"><?php echo $success ?></p>
                            <?php } if (isset($danger)) { ?>
                                <p class="bg-danger" align="center"><?php echo $danger ?></p>
                            <?php } ?>
                            <h1 class="page-header">
                                Password Recovery
                            </h1>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Password Recovery</h3>
                                </div>
                                <!-- Panel 1 -->
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/confirmPasswordChange') ?>">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="" maxlength="15" name="confirmation" class="form-control" id="inputEmail3" placeholder="Confirmation code">
                                                <small>exactly as it was sent to you</small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">Confirm</button>
                                            </div>
                                        </div>
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
