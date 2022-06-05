<div class="header-most-top">
    <p>Sempre com os melhores preços e descontos</p>
</div>
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 logo_agile">
            <h1>
                <a href="index.html">
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
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-truck" aria-hidden="true"></span> Rastrear Pedido</a>
                </li>
                <li>
                    <span class="fa fa-phone" aria-hidden="true"></span> 291 658 216
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal1">
                        <span class="fa fa-unlock-alt" aria-hidden="true"></span> Login </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Registro </a>
                </li>
            </ul>
            <!-- search -->
            <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="search" placeholder="O que procura?" required="">
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <span class="fa fa-search" aria-hidden="true"> </span>
                    </button>
                </form>
            </div>
            <!-- end--search -->
            <!-- cart -->
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
            <!-- end--cart -->
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php
//shop locator (popup)
$this->load->view('components/shop_locator');

//sign-in Modal
$this->load->view('components/sign_in');

//sign-up modal
$this->load->view('components/sign_up');
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="agile_inner_drop_nav_info">
                                    <div class="col-sm-4 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <li>
                                                <a href="product.html">Bakery</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Baking Supplies</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Coffee, Tea & Beverages</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Dried Fruits, Nuts</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Sweets, Chocolate</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Spices & Masalas</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Jams, Honey & Spreads</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <li>
                                                <a href="product.html">Pickles</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Pasta & Noodles</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Rice, Flour & Pulses</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Sauces & Cooking Pastes</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Snack Foods</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Oils, Vinegars</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Meat, Poultry & Seafood</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 multi-gd-img">
                                        <img src="<?php echo base_url('resources/images/nav.png'); ?>" alt="">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li class="">
                            <a class="nav-stylehead" href="<?php echo base_url("sobre/"); ?>">Sobre nós</a>
                        </li>
                        <li class="">
                            <a class="nav-stylehead" href="#">Folhetos</a>
                        </li>
                        <li class="">
                            <a class="nav-stylehead" href="#">Ajuda</a>
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
                        <li class="">
                            <a class="nav-stylehead" href="#">Contactos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- end--navigation -->


