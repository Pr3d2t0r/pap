<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ON MARKET</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item <?php echo $this->router->fetch_class() == "Home" ? "active" : ""; ?>">
            <a class="nav-link" href="<?php echo base_url()?>">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Gestão
        </div>
        <li class="nav-item <?php echo $this->router->fetch_class() == "Product" ? "active" : ""; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-box"></i>
                <span>Produtos</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url()?>">Produtos</a>
                    <a class="collapse-item" href="<?php echo base_url()?>">Categorias</a>
                    <a class="collapse-item" href="<?php echo base_url()?>">Discontos</a>
                </div>
            </div>
        </li>
        <li class="nav-item <?php echo $this->router->fetch_class() == "Campaign" ? "active" : ""; ?>">
            <a class="nav-link" href="<?php echo base_url()?>">
                <i class="fas fa-camera"></i>
                <span>Campanhas</span></a>
        </li>
        <li class="nav-item <?php echo $this->router->fetch_class() == "Faq" ? "active" : ""; ?>">
            <a class="nav-link" href="<?php echo base_url()?>">
                <i class="fas fa-question"></i>
                <span>FAQ</span></a>
        </li>
        <li class="nav-item <?php echo $this->router->fetch_class() == "Orderm" ? "active" : ""; ?>">
            <a class="nav-link" href="<?php echo base_url()?>">
                <i class="fas fa-box-open"></i>
                <span>Pedidos</span></a>
        </li>
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">João Fernandes</span>
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo base_url("logout")?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">


