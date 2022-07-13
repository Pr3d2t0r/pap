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
                        <?php foreach ($images as $image): ?>
                            <li data-thumb="<?php echo base_url("resources/images/produtos/".$image['path']); ?>">
                                <div class="thumb-image">
                                    <img src="<?php echo base_url("resources/images/produtos/".$image['path']); ?>"class="img-responsive" alt=""> </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3><?php echo $product['title']; ?></h3>
            <?php if (isset($review) && !empty($review)): ?>
                <div class="rating1">
                    <form action="<?php echo base_url("product/".$product['id']."/rating"); ?>" method="post">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5" <?php if (isset($review) && !empty($review) && $review==5) echo "checked";?>>
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4" <?php if (isset($review) && !empty($review) && $review==4) echo "checked";?>>
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" <?php if (isset($review) && !empty($review) && $review==3) echo "checked";?>>
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2" <?php if (isset($review) && !empty($review) && $review==2) echo "checked";?>>
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1" <?php if (isset($review) && !empty($review) && $review==1) echo "checked";?>>
                            <label for="rating1">1</label>
                        </span>
                    </form>
                </div>
            <?php endif; ?>
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
    <?php if (!empty($metadata)) :?>
        <div class="product-details">
            <h3 class="w3-head text-center">Detalhes</h3>
            <ul>
                <?php foreach($metadata as $data): ?>
                    <li>
                        <h4><?php echo $data["key"]; ?></h4>
                        <p><?php echo $data["content"]; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;?>
</div>

<?php

$this->load->view("components/product_stock");
