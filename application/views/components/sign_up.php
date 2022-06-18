<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Registro</h3>
                    <p>
                        Junte-se a nossa familia! Crie a sua conta.
                    </p>
                    <form action="<?php echo base_url('registro'); ?>" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Primeiro Nome" name="first_name" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Ultimo Nome" name="last_name" required="">
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="E-mail" name="email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Nº de telemovel" name="phone_number" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Morada" name="address" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Cidade" name="city" maxlength="120" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="País" name="country" maxlength="70" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Palavra-passe" name="password" id="password1" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Confirme a Palavra-passe" id="password2" required="">
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