<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

$where = ['username' => $this->session->userdata('username')];

$time = $this->db->get_where('user', $where)->row_object();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="png/image" href="<?= base_url('assets/ypbpi.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/template/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/AdminLTE.min.css') ?>">
    <!-- Theme Skin -->
    <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/skins/skin-blue.min.css') ?>">
    <!-- DataTable -->
    <link rel="stylesheet" href="<?= base_url('assets/datatable/datatables.min.css') ?>">

</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <a href="<?= base_url('Home') ?>" class="logo">

                <span class="logo-mini"><b>PC</b>A</span>

                <span class="logo-lg"><b>PC</b> Assembling</span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/template/dist/img/girl.jpg') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->userdata('username'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url('assets/template/dist/img/girl.jpg') ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <span class="text-center"><?= $this->session->userdata('username'); ?></span>
                                        <small><b>Role :</b> <?= $this->session->userdata('role') ?> | <b>Last Login :</b> <?= Carbon::parse($time->last_login)->diffForHumans() ?> </small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="" class="btn btn-default btn-flat">Change Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('Login/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>