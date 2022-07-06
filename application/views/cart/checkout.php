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
        <?php if (isset($cart) && !empty($cart)): ?>
            <div class="checkout-right">
                <h4>Seu carrinho de compras contém:
                    <span>3 Produtos</span>
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
                            <tr class="rem1">
                                <td class="invert">1</td>
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
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Spotzero Spin Mop</td>
                                <td class="invert">$888.00</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="rem2">
                                <td class="invert">2</td>
                                <td class="invert-image">
                                    <a href="#">
                                        <img src="<?php echo base_url("resources/images/s6.jpg"); ?>" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Fair & Lovely, 80 g</td>
                                <td class="invert">$121.60</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close2"> </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="rem3">
                                <td class="invert">3</td>
                                <td class="invert-image">
                                    <a href="#">
                                        <img src="<?php echo base_url("resources/images/s5.jpg"); ?>" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Sprite, 2.25L (Pack of 2)</td>
                                <td class="invert">$180.00</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close3"> </div>
                                    </div>
                                </td>
                            </tr>
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