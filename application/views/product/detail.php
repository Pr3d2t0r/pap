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
                                <img src="<?php echo base_url("resources/images/si.jpg"); ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="<?php echo base_url("resources/images/si2.jpg"); ?>">
                            <div class="thumb-image">
                                <img src="<?php echo base_url("resources/images/si2.jpg"); ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="<?php echo base_url("resources/images/si3.jpg"); ?>">
                            <div class="thumb-image">
                                <img src="<?php echo base_url("resources/images/si3.jpg"); ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>Zeeba Premium Basmati Rice - 5 KG</h3>
            <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
            </div>
            <p>
                <span class="item_price">$950.00</span>
                <del>$1300.00</del>
                <label>Entrega Gratuita</label>
            </p>
            <div class="single-infoagile">
                <ul>
                    <li>
                        Cash on Delivery Eligible.
                    </li>
                    <li>
                        Shipping Speed to Delivery.
                    </li>
                    <li>
                        Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).
                    </li>
                </ul>
            </div>
            <div class="product-single-w3l">
                <p>
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>This is a
                    <label>Vegetarian</label> product.</p>
                <ul>
                    <li>
                        Best for Biryani and Pulao.
                    </li>
                    <li>
                        After cooking, Zeeba Basmati rice grains attain an extra ordinary length of upto 2.4 cm/~1 inch.
                    </li>
                    <li>
                        Zeeba Basmati rice adheres to the highest food afety standards as your health is paramount to us.
                    </li>
                    <li>
                        Contains only the best and purest grade of basmati rice grain of Export quality.
                    </li>
                </ul>
                <p>
                    <i class="fa fa-refresh" aria-hidden="true"></i>All food products are
                    <label>non-returnable.</label>
                </p>
            </div>
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <form action="#" method="post">
                        <fieldset>
                            <input type="hidden" name="cmd" value="_cart" />
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="business" value=" " />
                            <input type="hidden" name="item_name" value="Zeeba Premium Basmati Rice - 5 KG" />
                            <input type="hidden" name="amount" value="950.00" />
                            <input type="hidden" name="discount_amount" value="1.00" /> <input type="hidden" name="discount_id" value="1" />
                            <input type="hidden" name="currency_code" value="USD" />
                            <input type="hidden" name="return" value=" " />
                            <input type="hidden" name="cancel_return" value=" " />
                            <input type="submit" name="submit" value="Add to cart" class="button" />
                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php $this->load->view("components/special_offers"); ?>