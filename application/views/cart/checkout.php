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
                <form action="<?php echo base_url("checkout"); ?>" method="post">
                    <?php if (isset($personalInfo) && !empty($personalInfo)): ?>
                        <h4 class="header">Escolha as informações de entrega</h4>
                        <?php if (isset($formErrors["personal_info_id"])): ?>
                        <div class="error">
                            <?php echo $formErrors["personal_info_id"]['error']; ?>
                        </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                                <table class="timetable_sub">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Numero de telemovel</th>
                                        <th>Morada</th>
                                        <th>Cidade</th>
                                        <th>País</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($personalInfo as $item): ?>
                                        <tr class="rem">
                                            <td class="invert">
                                                <input type="radio" name="personal_info_id" value="<?php echo $item["id"]; ?>" <?php if (isset($cart['personal_info_id']) && $cart['personal_info_id'] != null && $cart['personal_info_id'] == $item['id']) echo "checked"; ?>>
                                            </td>
                                            <td class="invert"><?php echo $item["first_name"] . " " . $item["last_name"]; ?></td>
                                            <td class="invert"><?php echo $item["phone_number"]; ?></td>
                                            <td class="invert"><?php echo $item["address"]; ?></td>
                                            <td class="invert"><?php echo $item["city"]; ?></td>
                                            <td class="invert"><?php echo $item["country"]; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    <?php endif; ?>
                    <div class="address_form_agile">
                        <a href="#" data-toggle="modal" data-target="#personalInfoModal">Usar novas informações de entrega</a>
                        <div class="checkout-right-basket">
                            <button type="submit">Prossiga para o pagamento
                                <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </form>
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
        <?php endif; ?>
    </div>
</div>