<?php $this->load->view('components/newsletter'); ?>

<footer>
    <div class="container">
        <div class="w3l-grids-footer">
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-map-marker" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>Rastreie seu pedido</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-refresh" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>Aceitamos Devoluções</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-4 offer-footer">
                <div class="col-xs-4 icon-fot">
                    <span class="fa fa-times" aria-hidden="true"></span>
                </div>
                <div class="col-xs-8 text-form-footer">
                    <h3>Cancelamento Online</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="footer-info w3-agileits-info">
            <h3>Categorias</h3>
            <div class="col-sm-5 address-right">
                <?php foreach ($categories as $categoryArr): ?>
                    <div class="col-xs-6 footer-grids">
                        <ul>
                            <?php foreach ($categoryArr as $category): ?>
                                <li>
                                    <a href="<?php echo base_url("produtos/".$category['slug']);?>"><?php echo $category['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-5 address-right">
                <div class="col-xs-6 footer-grids">
                    <h3>Acesso Rápido</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url("sobre"); ?>">Sobre Nós</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("contactos"); ?>">Contacte-nos</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("ajuda"); ?>">Ajuda</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("termos"); ?>">Termos de Utilização</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("privacidade"); ?>">Politica de Privacidade</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-6 footer-grids">
                    <h3>Contactos</h3>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i> Avenida do Infante n.º 6 9000-015 - Funchal </li>
                        <li>
                            <i class="fa fa-mobile"></i> 333 222 3333 </li>
                        <li>
                            <i class="fa fa-phone"></i> (+351) 291 201 770 </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <a href="mailto:info@epcc.pt"> info@epcc.pt</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2 footer-grids  w3l-socialmk">
                <h3>Siga-nos</h3>
                <div class="social">
                    <ul>
                        <li>
                            <a class="icon fb" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon tw" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="icon gp" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Aplicação android caso tenha descomentar -->
                <!--<div class="agileits_app-devices">
                    <h5>Faça Download da Nossa App</h5>
                    <a href="#">
                        <img src="<?php /*echo base_url('resources/images/1.png'); */?>" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php /*echo base_url('resources/images/2.png'); */?>" alt="">
                    </a>
                    <div class="clearfix"> </div>
                </div>-->
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="agile-sometext">
            <div class="sub-some">
                <h5>On Market Online</h5>
                <p>Faça o pedido online hoje. Todos os seus produtos favoritos do supermercado, disponiveis online com o preço baixo e fazemos entregas ao domicílio.</p>
            </div>

            <div class="sub-some child-momu">
                <h5>Metodo de Pagamento</h5>
                <ul>
                    <li>
                        <img src="<?php echo base_url("resources/images/pay1.png"); ?>" alt="">
                    </li>
                    <li>
                        <img src="<?php echo base_url("resources/images/pay2.png"); ?>" alt="">
                    </li>
                    <li>
                        <img src="<?php echo base_url("resources/images/pay3.png"); ?>" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="copy-right">
    <div class="container">
        <p>© 2022 On Market. All rights reserved</p>
    </div>
</div>


<script src="<?php echo base_url("resources/js/jquery-2.1.4.min.js"); ?>"></script>

<script src="<?php echo base_url("resources/js/jquery.magnific-popup.js"); ?>"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>

<script src="<?php echo base_url("resources/js/minicart.js"); ?>"></script>
<script>
    //https://github.com/jeffharrell/minicart#basic-setup
    // user-content-minicartjs
    paypalm.minicartk.render({
        strings:{
            button: 'Check Out',
            subtotal: 'Sub-total:',
            discount: 'Desconto:',
            empty: 'O Seu Carrinho está vazio!'
        },
        action: "<?php echo base_url("cart/redirect"); ?>",
    });
    //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js
    <?php if ($isLoggedIn): ?>
        var timeout1, timeout2, timeout3, checkout=false, inpt;
        paypalm.minicartk.cart.on('checkout', function (evt) {
            var items = paypalm.minicartk.cart.items();
            var newItems = [];
            for (var i = 0; i < items.length; i++) {
                newItems.push(items[i]._data);
            }
            $.ajax({
                url: "<?php echo base_url("/api/cart/user/" . $user->id); ?>",
                success: function (data) {
                    $.ajax({
                        url: "<?php echo base_url("/api/cart/checkout/"); ?>",
                        data: {
                            cart_id: data.id,
                            items: newItems
                        },
                        method: "POST",
                        success: function (xdata) {
                            console.log(xdata)
                            if (typeof xdata.error !== "undefined"){
                                clearTimeout(timeout1)
                                evt.preventDefault();
                                $(".minikcartk-error").html("Não é possivel efetuar checkout neste momento, tente novamente mais tarde!")
                                timeout1 = setTimeout(() => {
                                    $(".minikcartk-error").html("")
                                }, 4000)
                            }
                        },
                        error: function (data) {
                            console.log(data);

                        }
                    })
                },
                error: function () {
                    console.log("err1.1")
                }
            })
        });
        paypalm.minicartk.cart.on('add', (idx, product, isExisting) => {

            $.ajax({
                url: "<?php echo base_url("/api/cart/user/" . $user->id); ?>",
                success: function (data) {
                    $.ajax({
                        url: "<?php echo base_url("/api/cart/add/"); ?>",
                        data: {
                            product_id: product._data.id,
                            quantity: product._data.quantity,
                            cart_id: data.id,
                            discount_id: product._data.discount_id
                        },
                        method: "POST",
                        success: function (xdata) {
                            if (typeof xdata.error !== "undefined"){
                                clearTimeout(timeout1)
                                product.set("quantity", xdata.max_quantity);
                                $(".minikcartk-error").html("Quntidade maxima atingida!")
                                timeout1 = setTimeout(()=>{$(".minikcartk-error").html("")}, 4000)
                            }
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    })
                },
                error: function () {
                    console.log("err1.1")
                }
            })

        });
        paypalm.minicartk.cart.on('change', idx => {
            var product = paypalm.minicartk.cart.items(idx);
            $.ajax({
                url: "<?php echo base_url("/api/cart/user/" . $user->id); ?>",
                success: function (data) {
                    $.ajax({
                        url: "<?php echo base_url("/api/cart/add/"); ?>",
                        data: {
                            product_id: product._data.id,
                            quantity: product._data.quantity,
                            cart_id: data.id,
                            discount_id: product._data.discount_id
                        },
                        method: "POST",
                        success: function (xdata) {
                            if (typeof xdata.error !== "undefined"){
                                product.set("quantity", xdata.max_quantity);
                                if (checkout !== true){
                                    clearTimeout(timeout1)
                                    $(".minikcartk-error").html("Quntidade maxima atingida!")
                                    timeout1 = setTimeout(() => {
                                        $(".minikcartk-error").html("")
                                    }, 4000)
                                }else{
                                    paypalm.minicartk.view.hide();
                                    clearTimeout(timeout3)
                                    $(inpt).text(xdata.max_quantity);
                                    $(".error-msg").text("Quntidade maxima atingida!")
                                    timeout3 = setTimeout(()=>{$(".error-msg").text("")}, 4000)
                                    checkout=false;
                                    inpt=null;
                                }
                            }
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    })
                },
                error: function () {
                    console.log("err1.1")
                }
            })

        });
        paypalm.minicartk.cart.on('remove', (idx, product) => {
        $.ajax({
            url: "<?php echo base_url("/api/cart/user/" . $user->id); ?>",
            success: function (data) {
                $.ajax({
                    url: "<?php echo base_url("/api/cart/remove/"); ?>",
                    data: {
                        product_id: product._data.id,
                        cart_id: data.id
                    },
                    method: "POST",
                    success: function (xdata) {
                        clearTimeout(timeout2)
                        $(".minikcartk-success").html("Item removido com sucesso!")
                        timeout2 = setTimeout(()=>{$(".minikcartk-success").html("")}, 4000)
                    },
                    error: function (data) {
                        console.log(data)
                    }
                })
            },
            error: function () {
                console.log("err1.2")
            }
        })
    });

    <?php endif; ?>
</script>

<script src="<?php echo base_url("resources/js/jquery-ui.js"); ?>"></script>
<script>
    //<![CDATA[
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 1,
            max: 9000,
            values: [50, 9000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    }); //]]>
</script>

<script src="<?php echo base_url("resources/js/jquery.flexisel.js"); ?>"></script>
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 3,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2
                }
            }
        });

    });
</script>

<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>

<script src="<?php echo base_url("resources/js/SmoothScroll.min.js"); ?>"></script>

<script src="<?php echo base_url("resources/js/move-top.js"); ?>"></script>
<script src="<?php echo base_url("resources/js/easing.js"); ?>"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>

<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */
        // https://gist.github.com/svizion/3241271
        $().UItoTop({
            easingType: 'easeOutQuart',
            min:  600
        });

    });
</script>

<script src="<?php echo base_url("resources/js/bootstrap.js"); ?>"></script>

<script>
    $(function () {

        var menu_ul = $('.faq > li > ul'),
            menu_a = $('.faq > li > a');

        menu_ul.hide();

        menu_a.click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true, true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true, true).slideUp('normal');
            }
        });

    });
</script>

<script src="<?php echo base_url("resources/js/imagezoom.js"); ?>"></script>

<script src="<?php echo base_url("resources/js/jquery.flexslider.js");?>"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<script src="<?php echo base_url("resources/js/easyResponsiveTabs.js");?>"></script>

<script>
    $(document).ready(function () {
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

<script src="<?php echo base_url("resources/js/creditly.js");?>"></script>

<script>
    $(function () {
        var creditly = Creditly.initialize(
            '.creditly-wrapper .expiration-month-and-year',
            '.creditly-wrapper .credit-card-number',
            '.creditly-wrapper .security-code',
            '.creditly-wrapper .card-type');
        $(".creditly-card-form .submit").click(function (e) {
            var output = creditly.validate();
            console.log(output);
            if (!output) {
                e.preventDefault();
            }
        });
    });
</script>

<?php
    $openModal = $this->session->flashdata('openModal');
    if ($openModal != null):
?>
    <script>
        switch ("<?php echo $openModal; ?>") {
            case "register":
                $('#registerModal').modal('show');
                break;
            case "login":
                $('#loginModal').modal('show');
                break;
            case "PersonalInfo":
                $('#personalInfoModal').modal('show');
                break;
            case "RESET_CART":
                paypalm.minicartk.reset();
                break;
            default:
                var modal = $('<?php echo $openModal; ?>');
                if (modal != null)
                    $('<?php echo $openModal; ?>').modal('show');
        }

    </script>
<?php endif; ?>
    <script>
        function findProductById(pId){
            var items = paypalm.minicartk.cart.items();
            for (var i = 0; i < items.length; i++) {
                if (items[i]._data.id == pId) {
                    console.log(i)
                    items[i].idx = i;
                    return items[i];
                }
            }
            return null;
        }
        $('.value-plus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            divUpd.text(newVal);
            var row = $($($($(this).parent()).parent()).parent()).parent()
            var ciId = $($(row).find("#__cmd")).val();
            inpt=divUpd;
            checkout=true;
            findProductById(ciId).set('quantity', newVal);
        });

        $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal < 1) return;
            divUpd.text(newVal);
            var row = $($($($(this).parent()).parent()).parent()).parent()
            var ciId = $($(row).find("#__cmd")).val();
            inpt=divUpd;
            checkout=true;
            findProductById(ciId).set('quantity', newVal);
        });
        $(document).ready(function (c) {
            $('.rem .close').on('click', function (c) {
                var row = $($($(this).parent()).parent()).parent()
                var ciId = $($(row).find("#__cmd")).val();
                $(row).fadeOut('slow', function (c) {
                    $(row).remove();
                });
                <?php if (isset($cart)):?>
                    $.ajax({
                        url: "<?php echo base_url("/api/cart/user/" . $user->id); ?>",
                        success: function (data) {
                            $.ajax({
                                url: "<?php echo base_url("/api/cart/remove/"); ?>",
                                data: {
                                    product_id: ciId,
                                    cart_id: data.id
                                },
                                method: "POST",
                                success: function (xdata) {
                                    paypalm.minicartk.reset();
                                    var items = xdata.items;
                                    for (var i = 0; i < items.length; i++) {
                                        paypalm.minicartk.cart.add({
                                            amount: items[i].price,
                                            quantity: items[i].quantity,
                                            item_name: items[i].title,
                                            currency_code: "EUR",
                                            id: items[i].id,
                                            reference: items[i].reference
                                        });
                                        console.log(items[i]);
                                    }
                                    paypalm.minicartk.view.hide();
                                },
                                error: function (data) {
                                }
                            })
                        },
                        error: function () {
                            console.log("err1.2")
                        }
                    })
                <?php endif; ?>
            });
        });
    </script>
    <script>
        $(".list_of_cities").on("change", evt=>{
            var city = $(evt.target).val();

            $.ajax({
                url: "<?php echo base_url("/api/stores/find", null, false); ?>/"+city,
                method: "GET",
                success: function (xdata) {
                    var items = xdata;
                    $(".stores").html(`
                        <div>
                            <h3 class="w3-head">Lojas</h3>
                        </div>
                    `);
                    for (var i = 0; i < items.length; i++) {
                        $(".stores").append(`
                            <div class="store">
                                <div>
                                    <span class="fa fa-home" aria-hidden="true"></span>
                                    <span class="info">${items[i].address}</span>
                                </div>
                                <div>
                                    <span class="fa fa-phone" aria-hidden="true"></span>
                                    <span class="info">${items[i].phone_number}</span>
                                </div>
                            </div>
                        `);
                    }
                }
            })
        })
    </script>
    <script>
        $("#track-order").on("submit", evt=>{
            const status = sts => {
                switch (sts) {
                    case "received":
                        return "Processando";
                    case "awaiting_shipping":
                        return "Aguardando Envio";
                    case "shipped":
                        return "Enviado";
                    case "completed":
                        return "Entregue";
                }
                return "Processandoo";
            }
            evt.preventDefault();
            var reference = $(evt.target[0]).val();
            $.ajax({
                url: "<?php echo base_url("/api/order/find", null, false); ?>/"+reference,
                method: "GET",
                success: function (item) {

                    $(".order-info").html("");
                    if (typeof item.error != "undefined"){
                        $(".order-info").html("<h4 class='error'>Não existe nenhum pedido com esta referencia!</h4>");
                        return;
                    }
                    $(".order-info").append(`
                        <h4>Pedido #<span>${item.reference}</span></h4>
                        <ul>
                            <li>Comprador: ${item.name}</li>
                            <li>Status: ${status(item.status)}</li>
                            <li>Total: ${item.total.toFixed(2)}€</li>
                            <li>Efetuado em: ${item.created_at}</li>
                        </ul>

                    `);
                }
            })
        })
    </script>
    <script>
        var tmout;
        $(".copy-url").on("click", evt => {
            clearTimeout(tmout);
            navigator.clipboard.writeText($("#url").text())
            $(".url .expt-success").html("Copiado com successo");
            tmout = setTimeout(()=>{
                $(".url .expt-success").html("");
            }, 3000)
            evt.preventDefault();
        });
    </script>
    <script>
        $(".export a").on("click", evt => {
            $.ajax({
                url: "<?php echo base_url("/api/cart/public"); ?>/",
                data:{
                    cart_id: <?php echo $cart['id'] ?? -1; ?>
                },
                method: "POST",
                success: function (item) {
                    console.log(item);
                    $("#url").html("http://localhost/pap/cart/see?scrt="+ item.token);
                }
            })
        })
    </script>
</body>
</html>

