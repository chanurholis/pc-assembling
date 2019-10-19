<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="<?= base_url('home') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-circle-o"></i> <span>Master Rakit</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href=""><i class="fa fa-circle-o"></i> Processor
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('master/brand_processor') ?>"><i class="fa fa-circle-o"></i> Master Brand</a></li>
                            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Master Processor</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="fa fa-circle-o"></i> Motherboard
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('master/brand_motherboard') ?>"><i class="fa fa-circle-o"></i> Master Brand</a></li>
                            <li><a href="<?= base_url('master/motherboard') ?>"><i class="fa fa-circle-o"></i> Master Motherboard</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="fa fa-circle-o"></i> RAM
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('master/brand_ram') ?>"><i class="fa fa-circle-o"></i> Master Brand </a></li>
                            <li><a href="<?= base_url('master/ddr_ram') ?>"><i class="fa fa-circle-o"></i> Master DDR</a></li>
                            <li><a href="<?= base_url('master/kapasitas_ram') ?>"><i class="fa fa-circle-o"></i> Master Kapasitas </a></li>
                            <li><a href="<?= base_url('master/ram') ?>"><i class="fa fa-circle-o"></i> Master RAM</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="fa fa-circle-o"></i> Hardisk
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('master/brand_hardisk') ?>"><i class="fa fa-circle-o"></i> Master Brand</a></li>
                            <li><a href="<?= base_url('master/kapasitas_hardisk') ?>"><i class="fa fa-circle-o"></i> Master Kapasitas</a></li>
                            <li><a href="<?= base_url('master/hardisk') ?>"><i class="fa fa-circle-o"></i> Master Hardisk</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href=""><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?= base_url('home/app') ?>"><i class="fa fa-desktop"></i> <span>Rakit PC</span></a></li>
            <li><a href="<?= base_url('home/result') ?>"><i class="fa fa-database"></i> <span>My PC</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>