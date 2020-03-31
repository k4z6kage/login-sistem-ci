   <!-- Page Wrapper -->
   <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-laugh-wink"></i>
               </div>
               <div class="sidebar-brand-text mx-3">My Page <sup>2</sup></div>
           </a>

           <!-- Divider -->
           <hr class="sidebar-divider">

           <!-- Heading -->
           <?php foreach ($menu as $m) :  ?>
               <div class="sidebar-heading">
                   <?= $m['menu']; ?>
               </div>
           <?php endforeach; ?>
           <!-- Nav Item - Dashboard -->
           <?php foreach ($submenu as $sm) : ?>
               <li class="nav-item">
                   <a class="nav-link" href="index.html">
                       <i class="<?= $sm['icon'] ?>"></i>
                       <span><?= $sm['title'] ?></span></a>
               </li>
           <?php endforeach; ?>
           <!-- Divider -->
           <hr class="sidebar-divider">

           <!-- Heading -->
           <div class="sidebar-heading">
               User
           </div>

           <!-- Nav Item - Charts -->
           <li class="nav-item">
               <a class="nav-link" href="charts.html">
                   <i class="fas fa-fw fa-chart-area"></i>
                   <span>Charts</span></a>
           </li>

           <!-- Nav Item - Tables -->
           <li class="nav-item">
               <a class="nav-link" href="tables.html">
                   <i class="fas fa-fw fa-table"></i>
                   <span>Tables</span></a>
           </li>

           <!-- Divider -->
           <hr class="sidebar-divider d-none d-md-block my-0">

           <!-- Nav Item - Logout -->
           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                   <i class="fas fa-fw fa-sign-out-alt"></i>
                   <span>Logout</span></a>
           </li>


           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

       </ul>
       <!-- End of Sidebar -->