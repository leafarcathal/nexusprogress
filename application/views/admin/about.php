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
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">About</h3>
                            </div>
                            <!-- Panel 1 -->
                            <div class="panel-body">
                                <div> Hey folks! We're a free webtool to track your progress in your nexus weapon from Final Fantasy XIV.</div>
                                <div> As base, we used some info originally posted on <a href="http://www.reddit.com/r/ffxiv/comments/2gjv4x/soulglaze_theory_thread/" target="_blank">reddit</a>.</div>
                                <div>This is a player to player tool, to help everyone to manage their Nexus points. Feel free to join and contact us for any problem or suggestion.</div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Updates</h3>
                            </div>
                            <!-- Panel 1 -->
                            <div class="panel-body">
                                <ul>
                                    <li>20/09/2014 - Values of Blinding and Newborn Star updated to the confirmed ones. </li>
                                    <li>19/09/2014 - Beta release</li>
                                </ul>
                                <hr>
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
