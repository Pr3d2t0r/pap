<!-- Campanhas -->
<?php if (isset($campaigns) && count($campaigns) > 0) :?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <?php $first=true; for ($i=0; $i<count($campaigns); $i++): ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($first){ echo "active"; $first=false; }?>"></li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach ($campaigns as $key => $campaign): ?>
                <div class="item <?php if($key != 0) echo "item" . $key; else echo "active"; ?>" style="background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?php echo base_url("resources/images/campaigns/".$campaign["thumbnail"]) ?>) no-repeat;background-size:cover;">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3><?php echo $campaign['title']?></h3>
                            <p><?php echo $campaign['description']?></p>
                            <a class="button2" href="<?php echo $campaign['href']?>">Ver Mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Proximo</span>
        </a>
    </div>
<?php endif;?>
<!-- Produtos -->
<div class="ads-grid" >
    <div class="container">
            <h3 class="tittle-w3l">Nosso Produtos
                <span class="heading-style">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
            </h3>
            <div class="side-bar col-md-3">
                <form action="" method="post" class="filter-form">
                    <div class="search-hotel">
                        <h3 class="agileits-sear-head">Procure aqui..</h3>
                        <input type="search" placeholder="Nome do produto..." name="q" value="<?php if(isset($filters['q'])) echo $filters['q']; ?>">
                    </div>
                    <div class="range">
                        <h3 class="agileits-sear-head">Preço</h3>
                        <ul class="dropdown-menu6">
                            <li>
                                <div id="slider-range"></div>
                                <input type="text" id="amount" name="range" style="border: 0; color: #ffffff; font-weight: normal;" disabled/>
                            </li>
                        </ul>
                    </div>
                    <div class="left-side">
                        <h3 class="agileits-sear-head">Desconto</h3>
                        <ul>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="5" <?php if(isset($filters['discount']) && $filters['discount'] == 5) echo "checked='checked'"; ?>>
                                    <span class="span">5% ou Mais</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="10" <?php if(isset($filters['discount']) && $filters['discount'] == 10) echo "checked='checked'"; ?>>
                                    <span class="span">10% ou Mais</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="20" <?php if(isset($filters['discount']) && $filters['discount'] == 20) echo "checked='checked'"; ?>>
                                    <span class="span">20% ou Mais</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="30" <?php if(isset($filters['discount']) && $filters['discount'] == 30) echo "checked='checked'"; ?>>
                                    <span class="span">30% ou Mais</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="50" <?php if(isset($filters['discount']) && $filters['discount'] == 50) echo "checked='checked'"; ?>>
                                    <span class="span">50% ou Mais</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="checked='checked'" name="discount" value="60" <?php if(isset($filters['discount']) && $filters['discount'] == 60) echo "checked='checked'"; ?>>
                                    <span class="span">60% ou Mais</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- reviews -->
                    <div class="customer-rev left-side">
                        <h3 class="agileits-sear-head">Avaliações</h3>
                        <ul>
                            <li>
                                <label>
                                    <input type="radio" name="ratings" class="hidden" value="5" <?php if(isset($filters['ratings']) && $filters['ratings'] == 5) echo "checked='checked'"; ?>>
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span>5.0</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="ratings" class="hidden" value="4" <?php if(isset($filters['ratings']) && $filters['ratings'] == 4) echo "checked='checked'"; ?>>
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <span>4.0</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="ratings" value="3" class="hidden" <?php if(isset($filters['ratings']) && $filters['ratings'] == 3) echo "checked='checked'"; ?>>
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <span>3.0</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="ratings" value="2" class="hidden" <?php if(isset($filters['ratings']) && $filters['ratings'] == 2) echo "checked='checked'"; ?>>
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <span>2.0</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="ratings" value="1" class="hidden" <?php if(isset($filters['ratings']) && $filters['ratings'] == 1) echo "checked='checked'"; ?>>
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <span>1.0</span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-submit">
                        <input type="submit" value="Filtrar">
                    </div>
                    <div class="filter-submit">
                        <a href="<?php echo base_url(); ?>" class="filter-reset">Limpar Filtros</a>
                    </div>
                </form>
            </div>
            <!-- produtos -->
            <div class="agileinfo-ads-display col-md-9" id="products">
                <?php if(isset($products) && count($products) > 0): ?>
                    <div class="wrapper">
                        <div class="product-sec1">
                            <?php foreach ($products as $product): ?>
                                <div class="col-md-4 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="<?php echo base_url("resources/images/produtos/resized/".$product['image']);?>" alt="">
                                            <?php if (isset($product['discount_percentage'])): ?><span class="product-new-top"><?php echo $product['discount_percentage']; ?>%</span> <?php endif; ?>
                                        </div>
                                        <div class="item-info-product ">
                                            <h4>
                                                <a href="<?php echo base_url("produto/".$product['id']); ?>"><?php echo $product['title']; ?></a>
                                            </h4>
                                            <div class="info-product-price">
                                                <span class="item_price"><?php echo $product['new_price'] ?? $product['price']; ?>€</span>
                                                <?php if (isset($product['new_price'])): ?>
                                                    <del><?php echo $product['price']; ?>€</del>
                                                <?php endif;?>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="href" value="<?php echo base_url("produto/".$product['id']); ?>">
                                                        <input type="hidden" name="item_name" value="<?php echo $product['title']; ?>" />
                                                        <input type="hidden" name="amount" value="<?php echo $product['price']; ?>" />
                                                        <input type="hidden" name="discount_amount" value="<?php echo $product['discount_amount'] ?? 0; ?>" />
                                                        <input type="hidden" name="discount_id" value="<?php echo $product['discount_id'] ?? ""; ?>" />
                                                        <input type="hidden" name="currency_code" value="EUR" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Pôr no Carrinho" class="button" />
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <a href="<?php echo base_url("produto/".$product['id']); ?>" class="">Ver mais</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="wrapper">
                        <h3>Não existem produtos!</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
</div>
