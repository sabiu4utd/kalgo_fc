
<header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-transparent navbar-theme-primary">
        <div class="container position-relative"><a class="navbar-brand shadow-soft py-1 px-4 rounded border border-light mr-lg-4" href="<?php echo site_url("welcome"); ?>" style="font-size:20pt; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">KYS</a>
            <div class="navbar-collapse collapse" id="navbar_global">
             
                <div class="navbar-collapse-header">
                    <div class="row">
                        
                        <div class="col-6 collapse-brand"><a href="index-2.html" class="navbar-brand shadow-soft py-2 px-3 rounded border border-light"><img src="<?php echo base_url(); ?>assets/img/brand/dark.svg" alt="Themesberg logo"></a></div>
                        <div class="col-6 collapse-close"><a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a></div>
                    </div>
                </div>
                
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <!-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><span
                                    class="nav-link-inner-text">Home</span>
                            </a>
                        </li> -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown"><span class="nav-link-inner-text">News</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?php echo site_url("admin/records"); ?>" ><span class="nav-link-inner-text">Records</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown"><span class="nav-link-inner-text">Premier</span> <span class="fas fa-angle-down nav-link-arrow ml-2"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/pfixtures"); ?>">Fixtures</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/presults"); ?>">Results</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/ptables"); ?>">Table</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/pscorers"); ?>">Scorers</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown"><span class="nav-link-inner-text">FA Cup</span> <span class="fas fa-angle-down nav-link-arrow ml-2"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/ffixtures"); ?>">Fixtures</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/fresults"); ?>">Results</a></li>
                           <li><a class="dropdown-item" href="<?php echo site_url("admin/fscorers"); ?>">Scorers</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown"><span class="nav-link-inner-text">Champions League</span> <span class="fas fa-angle-down nav-link-arrow ml-2"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/cfixtures"); ?>">Fixtures</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/cresults"); ?>">Results</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/ctables"); ?>">Table</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("admin/cscorers"); ?>">Scorers</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center"><a href="#" data-toggle="modal" data-target="#modal-form" class="btn btn-primary text-secondary mr-3"><i class="fas fa-key mr-2"></i> Sign In</a>
                </a> <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></div>
        </div>
    </nav>
</header>