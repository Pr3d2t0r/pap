<?php
    $this->load->view("components/banner");
    $this->load->view("components/bread_crumbs");
?>

<div class="privacy">
    <div class="container">
        <h3 class="tittle-w3l">Checkout
            <span class="heading-style">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
        </h3>
        <?php if (isset($cart) && !empty($cart) && isset($cartItems) && !empty($cartItems)): ?>
            <div class="checkout-right">
                <h4>Seu carrinho de compras contém:
                    <span><?php echo count($cartItems)?> Produtos</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>ID.</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Nome do Produto</th>

                                <th>Preço</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                        <div class="error">
                            <p class="error-msg"></p>
                        </div>
                            <?php foreach ($cartItems as $item): ?>
                                <tr class="rem">
                                    <input type="hidden" value="<?php echo $item["product_id"]; ?>" id="__cmd">
                                    <td class="invert"><?php echo $item["product_id"]; ?></td>
                                    <td class="invert-image">
                                        <a href="#">
                                            <img src="<?php echo base_url("resources/images/a7.jpg"); ?>" alt=" " class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <div class="quantity-select">
                                                <div class="entry value-minus">&nbsp;</div>
                                                <div class="entry value">
                                                    <span><?php echo $item["quantity"]; ?></span>
                                                </div>
                                                <div class="entry value-plus active">&nbsp;</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">Spotzero Spin Mop</td>
                                    <td class="invert"><?php echo $item["price"]; ?></td>
                                    <td class="invert">
                                        <div class="rem">
                                            <div class="close" > </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
            <div class="address_form_agile">
                <h4>Adicionar novas informações de entrega</h4>
                <form action="<?php echo base_url("pagamento"); ?>" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" placeholder="Full Name" required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Mobile Number" name="number" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input type="text" placeholder="Landmark" name="landmark" required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>
                                <div class="controls">
                                    <input type="text" placeholder="Town/City" name="city" required="">
                                </div>
                                <div class="controls">
                                    <select class="option-w3ls">
                                        <option>Select Address type</option>
                                        <option>Office</option>
                                        <option>Home</option>
                                        <option>Commercial</option>

                                    </select>
                                </div>
                            </div>
                            <button class="submit check_out">Entrega neste endereço</button>
                        </div>
                    </div>
                </form>
                <div class="checkout-right-basket">
                    <a href="<?php echo base_url("pagamento"); ?>">Prossiga para o pagamento
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <?php else: ?>
            <div class="checkout-right">
                <?php if ($isLoggedIn):?>
                    <h4>Seu carrinho de compras está vazio!</h4>
                <?php else: ?>
                    <h4>Faça <a href="#" data-toggle="modal" data-target="#loginModal">Login</a> para começar a comprar!</h4>
                <?php endif; ?>
            </div>
        <? endif; ?>
    </div>
</div>