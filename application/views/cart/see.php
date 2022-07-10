<?php
    $this->load->view("components/banner");
    $this->load->view("components/bread_crumbs");
?>

<div class="privacy">
    <div class="container">
        <h3 class="tittle-w3l">Carrinho
            <span class="heading-style">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
        </h3>
        <?php if (isset($cart) && !empty($cart) && isset($cartItems) && !empty($cartItems)): ?>
            <div class="checkout-right">
                <h4>O Carrinho de compras contém:
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
                            </tr>
                        </thead>
                        <tbody>
                        <div class="error">
                            <p class="error-msg"></p>
                        </div>
                            <?php foreach ($cartItems as $item): ?>
                                <tr class="rem">
                                    <td class="invert"><?php echo $item["product_id"]; ?></td>
                                    <td class="invert-image">
                                        <a href="#">
                                            <img src="<?php echo base_url("resources/images/a7.jpg"); ?>" alt=" " class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <div class="quantity-select">
                                                <div class="entry value">
                                                    <span><?php echo $item["quantity"]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">Spotzero Spin Mop</td>
                                    <td class="invert"><?php echo $item["price"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <?php else: ?>
            <div class="checkout-right">
                <h4>Seu carrinho de compras está vazio!</h4>
            </div>
        <?php endif; ?>
    </div>
</div>