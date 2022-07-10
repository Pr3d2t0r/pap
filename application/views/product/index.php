<?php
    $this->load->view("components/banner");
    $this->load->view("components/bread_crumbs");
?>

<div class="ads-grid">
        <div class="container">

            <h3 class="tittle-w3l">Nosso Produtos
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="agileits-sear-head">Procure aqui..</h3>
                    <form action="#" method="post">
                        <input type="search" placeholder="Nome do produto..." name="search" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <div class="range">
                    <h3 class="agileits-sear-head">Preço</h3>
                    <ul class="dropdown-menu6">
                        <li>
                            <div id="slider-range"></div>
                            <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" disabled/>
                        </li>
                    </ul>
                </div>
                <!-- descontos -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">Desconto</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">5% ou Mais</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">10% ou Mais</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">20% ou Mais</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">30% ou Mais</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">50% ou Mais</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">60% ou Mais</span>
                        </li>
                    </ul>
                </div>
                <!-- reviews -->
                <div class="customer-rev left-side">
                    <h3 class="agileits-sear-head">Avaliações</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span>5.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>4.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>2.5</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- ofertas -->
                <div class="deal-leftmk left-side">
                    <h3 class="agileits-sear-head">Ofertas</h3>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="<?php echo base_url("resources/images/d2.jpg"); ?>" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Lay's Potato Chips</h3>
                            <a href="#">$18.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="<?php echo base_url("resources/images/d1.jpg"); ?>" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Bingo Mad Angles</h3>
                            <a href="#">$9.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="<?php echo base_url("resources/images/d4.jpg"); ?>" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Tata Salt</h3>
                            <a href="#">$15.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="<?php echo base_url("resources/images/d5.jpg"); ?>" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Gujarat Dry Fruit</h3>
                            <a href="#">$525.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="<?php echo base_url("resources/images/d3.jpg"); ?>" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Cadbury Dairy Milk</h3>
                            <a href="#">$149.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- produtos -->
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper">
                    <!-- first section (nuts) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">Nuts</h3>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/m1.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Almonds, 100g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$149.00</span>
                                        <del>$280.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Almonds, 100g" />
                                                <input type="hidden" name="amount" value="149.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/m2.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Cashew Nuts, 100g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$200.00</span>
                                        <del>$420.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Cashew Nuts, 100g" />
                                                <input type="hidden" name="amount" value="200.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/m3.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Pista..., 250g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$520.99</span>
                                        <del>$600.99</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Pista, 250g" />
                                                <input type="hidden" name="amount" value="520.99" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- third section (oils) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">Oils</h3>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk4.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Freedom Oil, 1L</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$78.00</span>
                                        <del>$110.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Freedom Sunflower Oil, 1L" />
                                                <input type="hidden" name="amount" value="78.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk5.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Saffola Gold, 1L</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$130.00</span>
                                        <del>$150.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Saffola Gold, 1L" />
                                                <input type="hidden" name="amount" value="130.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk6.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Fortune Oil, 5L</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$399.99</span>
                                        <del>$500.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Fortune Oil, 5L" />
                                                <input type="hidden" name="amount" value="399.99" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- fourth section (noodles) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">Pasta & Noodles</h3>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk7.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Yippee Noodles, 65g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$15.00</span>
                                        <del>$25.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="YiPPee Noodles, 65g" />
                                                <input type="hidden" name="amount" value="15.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk8.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Wheat Pasta, 500g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$98.00</span>
                                        <del>$120.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Wheat Pasta, 500g" />
                                                <input type="hidden" name="amount" value="98.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url("resources/images/mk9.jpg");?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">Ver Mais</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="#">Chinese Noodles, 68g</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$11.99</span>
                                        <del>$15.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" /> <input type="hidden" name="id" value="1" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Chinese Noodles, 68g" />
                                                <input type="hidden" name="amount" value="11.99" />
                                                <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>