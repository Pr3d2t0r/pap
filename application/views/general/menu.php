<div class="header-most-top">
    <p>Sempre com os melhores preços e descontos</p>
</div>
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 logo_agile">
            <h1>
                <a href="<?php echo base_url(); ?>">
                    <span>O</span>n
                    <span>M</span>arket
                    <img src="<?php echo base_url('resources/images/logo2.png');?>" alt=" ">
                </a>
            </h1>
        </div>
        <div class="col-md-8 header">
            <ul>
                <li>
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
                        <span class="fa fa-map-marker" aria-hidden="true"></span> Lojas Perto de Si</a>
                </li>
                <li>
                    <a  class="play-icon popup-with-zoom-anim" href="#small-dialog2">
                        <span class="fa fa-truck" aria-hidden="true"></span> Rastrear Pedido</a>
                </li>
                <li>
                    <span class="fa fa-phone" aria-hidden="true"></span> 291 658 216
                </li>
                <?php if (!isset($isLoggedIn) || !$isLoggedIn): ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#loginModal">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Login </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#registerModal">
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Registo </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo base_url("logout"); ?>">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Logout </a>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- search -->
            <div class="agileits_search">
                <form action="<?php echo base_url(); ?>" method="post">
                    <input name="q" type="search" placeholder="O que procura?" required="">
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <span class="fa fa-search" aria-hidden="true"> </span>
                    </button>
                </form>
            </div>
            <!-- end--search -->
            <!-- cart -->
            <?php if (!isset($checkout) || $checkout===false): ?>
                <div class="top_nav_right">
                    <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                        <form action="#" method="post" class="last">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="display" value="1">
                            <button class="w3view-cart" type="submit" name="submit" value="">
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end--cart -->
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php
//shop locator (popup)
$this->load->view('components/shop_locator');
$this->load->view('components/track_order');
if (!isset($isLoggedIn) || !$isLoggedIn) {
    //sign-in Modal
    $this->load->view('components/sign_in');

    //sign-up modal
    $this->load->view('components/sign_up');
}else{
    if (isset($checkout) && $checkout) {
        $this->load->view('components/add_personal_info');
        $this->load->view('components/export_cart');

    }
}
?>

<!-- navigation -->
<div class="ban-top">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav menu__list">
                        <!--<li class="active">
                            <a class="nav-stylehead" href="#">Home
                                <span class="sr-only">(Atual)</span>
                            </a>
                        </li>-->
                        <li class="dropdown <?php echo $this->router->fetch_class() == "Product" ? "active" : ""; ?>">
                            <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="agile_inner_drop_nav_info">
                                    <?php foreach ($categories as $categoryArr): ?>
                                        <div class="col-sm-4 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <?php foreach ($categoryArr as $category): ?>
                                                    <li>
                                                        <a href="<?php echo base_url("produtos/".$category['slug']);?>"><?php echo $category['title']; ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                    <a href="<?php echo base_url("produtos");?>">Ver todos</a>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li class="<?php echo $this->router->fetch_class() == "Help" ? "active" : ""; ?>">
                            <a class="nav-stylehead" href="<?php echo base_url("ajuda/"); ?>">Ajuda
                                <?php if ($this->router->fetch_class() == "Help"): ?>
                                    <span class="sr-only">(Atual)</span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="<?php echo $this->router->fetch_class() == "Contacts" ? "active" : ""; ?>">
                            <a class="nav-stylehead" href="<?php echo base_url("contactos/"); ?>">Contactos
                                <?php if ($this->router->fetch_class() == "Contacts"): ?>
                                    <span class="sr-only">(Atual)</span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <!--<li class="dropdown">
                            <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="icons.html">Web Icons</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- end--navigation -->


