<?php
$this->load->view("components/banner");
$this->load->view("components/bread_crumbs");
?>

<div class="privacy">
    <div class="container">
        <h3 class="tittle-w3l">Payment
            <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
        </h3>
        <div class="checkout-right">
            <div id="parentHorizontalTab">
                <ul class="resp-tabs-list hor_1">
                    <li>Credit/Debit</li>
                    <li>Paypal Account</li>
                </ul>
                <div class="resp-tabs-container hor_1">
                    <div>
                        <form action="#" method="post" class="creditly-card-form agileinfo_form">
                            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="credit-card-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Nome no Cartão</label>
                                            <input class="billing-address-name form-control" required type="text" name="name" placeholder="Nome...">
                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Numero do Cartão</label>
                                                    <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
                                                           autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">CVV</label>
                                                    <input class="security-code form-control"  inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Data de Validade</label>
                                            <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                                        </div>
                                        <div class="checkbox checkbox-small">
                                            <label>
                                                <input class="i-check" type="checkbox" checked="">Guardar nos meus cartões</label>
                                        </div>
                                    </div>
                                    <button class="submit">
                                        <span>Faça o Pagamento</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div>
                        <div id="tab4" class="tab-grid" style="display: block;">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="pp-img" src="<?php echo base_url("resources/images/paypal.png"); ?>" alt="Image Alternative text" title="Image Title">
                                    <p>Importante: Você será redirecionado para o site do PayPal para concluir seu pagamento com segurança.</p>
                                    <a class="btn btn-primary">Checkout via Paypal</a>
                                </div>
                                <div class="col-md-6 number-paymk">
                                    <form class="cc-form" action="#" method="">
                                        <div class="clearfix">
                                            <div class="form-group form-group-cc-number">
                                                <label>Numero do Cartão</label>
                                                <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text">
                                                <span class="cc-card-icon"></span>
                                            </div>
                                            <div class="form-group form-group-cc-cvc">
                                                <label>CVV</label>
                                                <input class="form-control" placeholder="xxxx" type="text">
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="form-group form-group-cc-name">
                                                <label>Nome no Cartão</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="form-group form-group-cc-date">
                                                <label>Data de Validade</label>
                                                <input class="form-control" placeholder="mm/yy" type="text">
                                            </div>
                                        </div>
                                        <div class="checkbox checkbox-small">
                                            <label>
                                                <input class="i-check" type="checkbox" checked="">Guardar nos meus cartões</label>
                                        </div>
                                        <input type="submit" class="submit" value="Faça o Pagamento">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>