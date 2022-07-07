<?php
    $registerError = $this->session->flashdata('registerErrors');
?>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Registo</h3>
                    <p>
                        Junte-se a nossa familia! Crie a sua conta.
                    </p>
                    <form action="<?php echo base_url('registro'); ?>" method="post">
                        <div class="<?php if (isset($registerError['first_name']["error"]) && $registerError['first_name']["error"] != null) echo "error";?> styled-input agile-styled-input-top">
                            <input type="text" placeholder="Primeiro Nome" name="first_name" required="" value="<?php if ($registerError != null) echo $registerError['first_name']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['first_name']["error"]) && $registerError['first_name']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['first_name']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['last_name']["error"]) && $registerError['last_name']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Ultimo Nome" name="last_name" required="" value="<?php if ($registerError != null) echo $registerError['last_name']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['last_name']["error"]) && $registerError['last_name']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['last_name']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['email']["error"]) && $registerError['email']["error"] != null) echo "error";?>">
                            <input type="email" placeholder="E-mail" name="email" required="" value="<?php if ($registerError != null) echo $registerError['email']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['email']["error"]) && $registerError['email']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['email']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['phone_number']["error"]) && $registerError['phone_number']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Nº de telemovel" name="phone_number" required="" value="<?php if ($registerError != null) echo $registerError['phone_number']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['phone_number']["error"]) && $registerError['phone_number']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['phone_number']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['address']["error"]) && $registerError['address']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Morada" name="address" required="" value="<?php if ($registerError != null) echo $registerError['address']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['address']["error"]) && $registerError['address']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['address']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['city']["error"]) && $registerError['city']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="Cidade" name="city" maxlength="120" required="" value="<?php if ($registerError != null) echo $registerError['city']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['city']["error"]) && $registerError['city']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['city']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['country']["error"]) && $registerError['country']["error"] != null) echo "error";?>">
                            <input type="text" placeholder="País" name="country" maxlength="70" required="" value="<?php if ($registerError != null) echo $registerError['country']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['country']["error"]) && $registerError['country']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['country']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input <?php if (isset($registerError['password']["error"]) && $registerError['password']["error"] != null) echo "error";?>">
                            <input type="password" placeholder="Palavra-passe" name="password" id="password1" required="" value="<?php if ($registerError != null) echo $registerError['password']['value'];?>">
                        </div>
                        <?php
                        if (isset($registerError['password']["error"]) && $registerError['password']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $registerError['password']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <div class="styled-input">
                            <input type="password" placeholder="Confirme a Palavra-passe" id="password2" required="" value="<?php if ($registerError != null) echo $registerError['password']['value'];?>">
                        </div>
                        <input type="submit" value="Registrar">
                    </form>
                    <p>
                        Ao clicar em registrar, Eu concordo com os
                        <a href="<?php echo base_url('termos'); ?>" target="_blank">termos de utilização</a>
                        e a
                        <a href="<?php echo base_url('privacidade'); ?>" target="_blank">politica de privacidade</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>