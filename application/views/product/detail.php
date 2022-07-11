<?php
    $this->load->view("components/banner");
    $this->load->view("components/bread_crumbs");
?>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <h3 class="tittle-w3l">Produto
            <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
        </h3>
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="<?php echo base_url("resources/images/si.jpg"); ?>">
                            <div class="thumb-image">
                                <img src="<?php echo base_url("resources/images/si.jpg"); ?>"class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="<?php echo base_url("resources/images/si2.jpg"); ?>">
                            <div class="thumb-image">
                                <img src="<?php echo base_url("resources/images/si2.jpg"); ?>" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="<?php echo base_url("resources/images/si3.jpg"); ?>">
                            <div class="thumb-image">
                                <img src="<?php echo base_url("resources/images/si3.jpg"); ?>" class="img-responsive" alt=""> </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3><?php echo $product['title']; ?></h3>
            <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4" checked>
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
            </div>
            <p>
                <span class="item_price"><?php echo $product['new_price'] ?? $product['price']; ?>€</span>
                <?php if (isset($product['new_price'])): ?>
                    <del><?php echo $product['price']; ?>€</del>
                <?php endif;?>
            </p>
            <div class="single-infoagile">
                <p><?php echo $product['description']; ?></p>
            </div>
            <div class="occasion-cart">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog3"><span class="fa fa-inbox" aria-hidden="true"></span> ver stock nas lojas</a>
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
                            <input type="submit" name="submit" value="Adicionar ao carrinho" class="button" />
                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <div>
        <h3 class="w3-head text-center">Detalhes</h3>
        <ul>
            <li>
                <h4>Meta-data key</h4>
                <p>Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value </p>
            </li>
            <li>
                <h4>Meta-data key</h4>
                <p>Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value </p>
            </li>
            <li>
                <h4>Meta-data key</h4>
                <p>Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value </p>
            </li>
            <li>
                <h4>Meta-data key</h4>
                <p>Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value Meta-data value </p>
            </li>
        </ul>
    </div>
</div>

<?php

$this->load->view("components/product_stock");
