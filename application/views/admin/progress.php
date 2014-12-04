<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Nexus Progress - Track your Nexus Weapon progress from FFXIV online!">
        <meta name="author" content="Nexus Progress">
        <meta name="keywords" content="nexus, progress, ffxiv, weapon, relic, xiv, finalfantasy, ff">

        <title>Nexus Progress</title>

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

    <style>
        .roulette{
            background-color: #F5C96C
        }
    </style>

    <body>

        <div id="wrapper">

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
                    <div class="row">
                    <div class="col-lg-12">
                        <?php if (isset($success)) { ?>
                            <p class="bg-success" align="center"><?php echo $success ?></p>
                        <?php } if (isset($danger)) { ?>
                            <p class="bg-danger" align="center"><?php echo $danger ?></p>
                        <?php } ?>
                    </div>
                        </div>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Progress
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url() ?>">Progress</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <form method="post" action="<?= base_url('admin/dashboard') ?>">
                            <div class="col-lg-12">
                                <h2>Add Progress</h2>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Contents</h3>
                                    </div>
                                    <div class="panel-body">
                                        <select class="form-control" name="content">
                                            <?php foreach ($select_contents as $row) { ?>
                                                <option value="<?= $row['id_content'] ?>"><?= $row['name'] ?></option>
                                            <?php } ?>
                                        </select><br>
                                        <select class="form-control" style="float: right" name="content_number">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Lights</h3>
                                    </div>
                                    <div class="panel-body">
                                        <select class="form-control" name="light">
                                            <?php foreach ($lights as $row) { ?>
                                                <option value="<?= $row['id_light'] ?>"><?= $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <br>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Insert Progress</button>
                            </div>
                    </div>


                            <?php if ($user_points <> '') { ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Content List</h2>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Content</th>
                                                        <th># of lights</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php foreach ($user_points as $row) { ?>
                                                        <tr class="<?= $row['class'] ?>">
                                                            <td><?= $row['Content'] ?></td>
                                                            <td><?= $row['NumberOfLights'] ?></td>
                                                            <td><?= $row['TotalByLight'] ?>
                                                                <button alt="details" style="float: right" type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#collapseme<?= $row['id_content'] ?>">
                                                                    <span class="glyphicon glyphicon-info-sign"></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr id="collapseme<?= $row['id_content'] ?>" class="collapse out">
                                                            <td style="border: none" ><div>
                                                                    <?php $user_lights = $this->Admin_Model->loadLightsByContent($this->session->userdata('id_user'), $row['id_content']) ?>
                                                                    <?php foreach ($user_lights as $luz) { ?>
                                                                        <?php echo $luz['NameLight'] . ' - ' . $luz['TotalValue'] . '<br>' ?>
                                                                    <?php } ?>
                                                                </div></td></tr>
                                                        <?php $total += $row['TotalByLight']; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- /.row -->
                        </form>
                    <!-- /.container-fluid -->
                    <?php $progress = ($total * 100) / 2000;
                          $progressbarTry = substr($progress, 0, 2);
                          if($progressbarTry <= 10){
                              $progressbar1 = substr($progress, 0, 1);
                          } else {
                              $progressbar1 = substr($progress, 0, 2);
                          }
                            ?>
                <!-- /#page-wrapper -->
<?php if ($user_points <> '') { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Your Progress<span style="font-size: 12px; float: right; color: black; font-weight: bold">Total Points: <?= $total ?></span></h2>

                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?= $total ?>" aria-valuemin="0" aria-valuemax="100"  style="width: <?= $progressbar1 ?>%; min-width: 1%">
                                <span align="center"> <?= $progress ?>% </span>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Last 10 Added</h2>
                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Content</th>
                                                        <th>Light</th>
                                                        <th>Points</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php foreach ($last_points as $lp) { ?>
                                                        <tr class="default">
                                                            <td><?= $lp['ContentName'] ?></td>
                                                            <td><?= $lp['LightName'] ?></td>
                                                            <td><?= $lp['Value'] ?>
                                                            </td>
                                                            <td style="text-align: center" align="center">
                                                                 <a onClick="confirm('Do you really want to delete this?')" href="<?= base_url('admin/removeContent') . '/' . $lp['idUserLight'] ?>"><button alt="details" type="button" class="btn btn-default btn-sm">
                                                                         <span class="glyphicon glyphicon-remove-circle"></span>
                                                                </button></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url() ?>/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>/js/bootstrap.min.js"></script>

    </body>

</html>
