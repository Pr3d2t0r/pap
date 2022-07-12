<div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Adicionar Produto</h1>
                                </div>
                                <div class="text-center">
                                    <h1 class="h5 text-gray-900 mb-3">Informação Geral</h1>
                                </div>
                                <div class="text-center">
                                    <?php if (!empty($formError)): ?>
                                        <p class="text-danger small"><?php echo $formError; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($success)): ?>
                                        <p class="text-success small"><?php echo $success; ?></p>
                                    <?php endif; ?>
                                </div>
                                <form action="" method="post" class="user">
                                    <div class="form-group">
                                        <label>Referencia: </label>
                                        <input type="text" class="form-control"
                                               placeholder="Referencia" name="reference" value="<?php echo set_value("reference"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nome: </label>
                                        <input type="text" class="form-control"
                                               placeholder="Nome" name="title" value="<?php echo set_value("title"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Titulo da pagina: </label>
                                        <input type="text" class="form-control"
                                               placeholder="Titulo da Pagina" name="meta_title" value="<?php echo set_value("meta_title"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição:</label>
                                        <textarea name="description" rows="6" class="form-control" placeholder="Descrição"><?php echo set_value("description"); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Preço:</label>
                                        <input type="text" class="form-control"
                                               placeholder="Preço" name="price" value="<?php echo set_value("price"); ?>" required>
                                    </div>
                                    <?php if (!empty($discounts)) :?>
                                        <div class="text-center">
                                            <h1 class="h5 text-gray-900 mb-3">Descontos</h1>
                                            <button id="clearDiscount" class="btn btn-outline-danger mb-4">Remover desconto</button>
                                        </div>
                                        <div class="form-group row w-75 mx-auto">
                                        <?php foreach ($discounts as $discountArr): ?>
                                            <div class="col-6">
                                                <?php foreach ($discountArr as $discount): ?>
                                                    <label style="width: fit-content" class="d-block mx-auto"><input type="radio" name="discountId" value="<?php echo $discount["id"];?>" <?php if(set_value("discount_id") == $discount['id']) echo "checked";?>> <?php echo $discount['campaign'] === false ? $discount["discount"]."%" : $discount['campaign']['title']."(".$discount["discount"]."%)";?></label>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-3">Imagens</h1>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="file" multiple name="images">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Guardar
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>