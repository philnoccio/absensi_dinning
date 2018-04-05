 <div id="wrapper">

 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Absensi Dining</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('Dining/index') ?>"><i class="fa fa-dashboard fa-fw"></i> Entering</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Dining/read') ?>"><i class="fa fa-table fa-fw"></i> Mahasiswa</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Dining/create') ?>" class="fa fa-users"> Insert Mahasiswa</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>