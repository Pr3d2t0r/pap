<div class="footer-top" id="newsletter">
    <div class="container-fluid">
        <div class="col-xs-8 agile-leftmk">
            <h2>Receba as nossas novidades por e-mail</h2>
            <p>Inscreva-se para receber as novidades!</p>
            <form action="<?php echo base_url("newsletter"); ?>" method="post">
                <input type="email" placeholder="E-mail" name="email" required="">
                <input type="submit" value="Subscrever">
            </form>
            <div class="newsform-w3l">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>
            </div>
        </div>
        <div class="col-xs-4 w3l-rightmk">
            <img src="<?php echo base_url('resources/images/tab3.png');?>" alt=" ">
        </div>
        <div class="clearfix"></div>
    </div>
</div>