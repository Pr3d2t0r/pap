<?php
$loginError = $this->session->flashdata('loginErrors');
?>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Login </h3>
                    <p>
                        Vamos começar suas compras no supermercado. Não tem uma conta?
                        <a href="#" data-toggle="modal" data-target="#registerModal">
                            Crie Uma Agora</a>
                    </p>
                    <form action="<?php echo base_url('login'); ?>" method="post">
                        <div class="styled-input agile-styled-input-top <?php if (isset($loginError['email']["error"]) && $loginError['email']["error"] != null) echo "error";?>">
                            <input type="email" placeholder="Email" name="email" required="" value="<?php if ($loginError != null) echo $loginError['email']['value'];?>">
                        </div>
                        <?php
                        if (isset($loginError['email']["error"]) && $loginError['email']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $loginError['email']["error"]; ?>
                            </div>
                        <?php endif; ?>

                        <div class="styled-input <?php if (isset($loginError['password']["error"]) && $loginError['password']["error"] != null) echo "error";?>">
                            <input type="password" placeholder="Palavra-passe" name="password" required="" value="<?php if ($loginError != null) echo $loginError['password']['value'];?>">
                        </div>
                        <?php
                        if (isset($loginError['password']["error"]) && $loginError['password']["error"] != null):
                            ?>
                            <div class="error">
                                <?php echo $loginError['password']["error"]; ?>
                            </div>
                        <?php endif; ?>
                        <input type="submit" value="Login">
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>