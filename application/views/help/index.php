<div class="page-head_agile_info_w3l"></div>
<?php $this->load->view('components/bread_crumbs'); ?>

<div class="faqs-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Ajuda
            <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
        </h3>
        <!-- //tittle heading -->
        <div>
            <div class="col-xs-7">
                <h4 class="help-head">Se o que precisa não está aqui não hesite em nos <a href="<?php echo base_url("contactos"); ?>">contactar</a></h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="faq-w3agile">
            <h3 class="w3-head">Perguntas mais frequentes</h3>
            <ul class="faq">
                <?php foreach ($questions ?? [] as $i => $question): ?>
                    <li class="item<?php echo $i+1; ?>">
                        <a href="#" title="click here"><?php echo $question["question"]; ?></a>
                        <ul>
                            <li class="subitem1">
                                <p><?php echo $question["response"]; ?></p>
                            </li>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

