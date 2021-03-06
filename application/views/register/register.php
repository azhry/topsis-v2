<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <title>Register</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url() ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url() ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url() ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= base_url() ?>/assets/pages/css/login-3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h3>Sistem Pendukung Keputusan</h3>
			<h3>Pemilihan Sekolah Dasar Islam Terpadu (SDIT)</h3>
			<h3>Di Kota Palembang</h3>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?= form_open('register') ?>
                <h3 class="form-title">Registrasi Akun Baru</h3>
                <?= $this->session->flashdata('msg') ?>
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <input class="form-control" type="text" autocomplete="off" placeholder="Username" name="username" />
                </div>
                <div class="form-group">
                    <label class="control-label">Nama</label>
                    <input class="form-control" type="text" autocomplete="off" placeholder="Nama" name="nama" />
                </div>
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">No. Hp</label>
                    <input class="form-control" type="text" autocomplete="off" placeholder="No.Hp" name="kontak" />
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="email" autocomplete="off" placeholder="Email" name="email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <textarea class="form-control" autocomplete="off" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password" autocomplete="off" placeholder="Password" name="password" />
                </div>
                <div class="form-group">
                    <label class="control-label">Re-type Password</label>
                    <input class="form-control" type="password" autocomplete="off" placeholder="Re-type Password" name="rpassword" />
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('login') ?>" class="pull-left">Login</a>
                    <input type="submit" name="submit" value="Register" class="btn green pull-right">
                </div>
            <?= form_close() ?>
        </div>
        <br><br><br>
        <!--[if lt IE 9]>
<script src="<?= base_url() ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?= base_url() ?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= base_url() ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <!-- <script src="<?= base_url() ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <script src="<?= base_url() ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> -->
    </body>

</html>