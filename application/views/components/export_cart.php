<div id="small-dialog" class="mfp-hide export">
    <h3>Envie o Carrinho para os seus amigos</h3>
    <div class="url">
        <h4>Url</h4>
        <a href="#" class="copy-url">Copiar para area de tranferêcia</a>
        <p id="url" ></p>
        <p class="expt-success"></p>
    </div>
    <div class="mail">
        <h4>Partilhar para o email</h4>
        <form action="<?php echo base_url("cart/share"); ?>" method="post">
            <input type="email" name="email" placeholder=" Email" required>
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>
