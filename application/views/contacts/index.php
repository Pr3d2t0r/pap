<div class="page-head_agile_info_w3l"></div>
<?php $this->load->view('components/bread_crumbs'); ?>

<div class="contact-w3l">
    <div class="container">
        <h3 class="tittle-w3l">Contacte-nos
            <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
        </h3>
        <div class="contact agileits">
            <div class="contact-agileinfo">
                <div class="contact-form wthree">
                    <form action="#" method="post">
                        <div class="">
                            <input type="text" name="name" placeholder="Nome" required="">
                        </div>
                        <div class="">
                            <input class="text" type="text" name="subject" placeholder="Assunto" required="">
                        </div>
                        <div class="">
                            <input class="email" type="email" name="email" placeholder="E-mail" required="">
                        </div>
                        <div class="">
                            <textarea placeholder="Mensagem" name="message" required=""></textarea>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="contact-right wthree">
                    <div class="col-xs-7 contact-text w3-agileits">
                        <h4>ENTRE EM CONTACTO:</h4>
                        <p>
                            <i class="fa fa-map-marker"></i> Avenida do Infante n.º 6 9000-015 - Funchal</p>
                        <p>
                            <i class="fa fa-phone"></i> Telephone : 333 222 3333</p>
                        <p>
                            <i class="fa fa-fax"></i> FAX : (+351) 291 201 770</p>
                        <p>
                            <i class="fa fa-envelope-o"></i> Email :
                            <a href="mailto:info@epcc.pt">info@epcc.pt</a>
                        </p>
                    </div>
                    <div class="col-xs-5 contact-agile">
                        <img src="<?php echo base_url("resources/images/contact2.jpg"); ?>" alt="">
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="map w3layouts">
    <iframe src="https://maps.google.com/maps?q=Avenida%20do%20Infante%20n.%C2%BA%206%209000-015%20-%20Funchal&t=&z=13&ie=UTF8&iwloc=&output=embed"
            allowfullscreen></iframe>
</div>