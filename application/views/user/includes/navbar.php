<!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="<?= base_url('admin') ?>">
                            <img src="<?= base_url() ?>/assets/layouts/layout6/img/logo.png" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                            
                            
                            <!-- BEGIN USER PROFILE -->
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-user" style="color: white; font-size: 23px; margin-right: 10px; margin-left: 10px;"></i>
                                </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <?php if (isset($id_role)): ?>
                                    <li>
                                        <?php if ($id_role == 1): ?>
                                        <a href="<?= base_url('admin/profil') ?>">
                                        <?php else: ?>
                                        <a href="<?= base_url('user/profil') ?>">
                                        <?php endif; ?>
                                            <i class="icon-user"></i> Profil
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php endif; ?>
                                    <li>
                                        <?php if (isset($id_role)): ?>
                                            <a href="<?= base_url('logout') ?>">
                                                <i class="icon-user"></i> Logout
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= base_url('login') ?>">
                                                <i class="icon-user"></i> Login
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->