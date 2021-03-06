<!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <div class="page-content page-content-popup">
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item">
                                <a href="<?= base_url('admin') ?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/daftar-sekolah') ?>" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Sekolah</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/kriteria') ?>" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Data Kriteria</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/daftar-pengguna') ?>" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Data Pengguna</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/perhitungan') ?>" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Perhitungan</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?= base_url('admin/cari') ?>" class="nav-link nav-toggle">
                                    <i class="fa fa-search"></i>
                                    <span class="title">Cari Sekolah</span>
                                </a>
                            </li> -->
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>