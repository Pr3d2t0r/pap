<div class="modal fade" id="personalInfoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Adicionar informação de entrega</h3>
                    <form action="<?php echo base_url('checkout'); ?>" method="post">
                        <input type="hidden" name="new_info" value="true">
                        <div class="<?php if (isset($formErrors['first_name']["error"]) && $formErrors['first_name']["error"] != null) echo "error";?> styled-input agile-styled-input-top">
                            <input type="text" placeholder="Primeiro Nome" name="first_name" required="" value="<?php if ($formErrors != null && isset($formErrors['first_name'])) echo $formErrors['first_name']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['first_name']["error"]) && $formErrors['first_name']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['first_name']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($formErrors['last_name']["error"]) && $formErrors['last_name']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Ultimo Nome" name="last_name" required="" value="<?php if ($formErrors != null && isset($formErrors['last_name'])) echo $formErrors['last_name']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['last_name']["error"]) && $formErrors['last_name']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['last_name']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($formErrors['phone_number']["error"]) && $formErrors['phone_number']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Nº de telemovel" name="phone_number" required="" value="<?php if ($formErrors != null && isset($formErrors['phone_number'])) echo $formErrors['phone_number']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['phone_number']["error"]) && $formErrors['phone_number']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['phone_number']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($formErrors['address']["error"]) && $formErrors['address']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Morada" name="address" required="" value="<?php if ($formErrors != null && isset($formErrors['address'])) echo $formErrors['address']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['address']["error"]) && $formErrors['address']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['address']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($formErrors['city']["error"]) && $formErrors['city']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Cidade" name="city" maxlength="120" required="" value="<?php if ($formErrors != null && isset($formErrors['city'])) echo $formErrors['city']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['city']["error"]) && $formErrors['city']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['city']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($formErrors['country']["error"]) && $formErrors['country']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="País" name="country" maxlength="70" required="" value="<?php if ($formErrors != null && isset($formErrors['country'])) echo $formErrors['country']['value'];?>">
                        </div>
                        <?php
                        if (isset($formErrors['country']["error"]) && $formErrors['country']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $formErrors['country']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="checkout-right-basket">
                            <button type="submit">Prossiga para o pagamento
                                <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>