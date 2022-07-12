<div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Editar</h1>
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
                                <form action="" method="post" class="user" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $campaign['id']; ?>">
                                    <div class="form-group">
                                        <label>Nome: </label>
                                        <input type="text" class="form-control"
                                               placeholder="Nome" name="title" value="<?php echo $campaign["title"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição:</label>
                                        <textarea name="description" rows="6" class="form-control" placeholder="Descrição"><?php echo $campaign["description"]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-0">Rederecionamento: </label>
                                        <p class="small text-left mb-2">(quando o user clicar em 'ver mais' será rederecionado para este link)</p>
                                        <input type="text" class="form-control"
                                               placeholder="Titulo da Pagina" name="meta_title" value="<?php echo $campaign["href"]; ?>" required>
                                    </div>
                                    <?php if (!empty($discounts)) :?>
                                        <div class="text-center">
                                            <h1 class="h5 text-gray-900 mb-0">Descontos</h1>
                                            <span class="mb-3 small text-warning d-block">O desconto é facultativo</span>
                                            <button id="clearDiscount" class="btn btn-outline-danger mb-4">Remover descontos</button>
                                        </div>
                                        <div class="form-group row w-75 mx-auto">
                                        <?php foreach ($discounts as $discountArr): ?>
                                            <div class="col-6">
                                                <?php foreach ($discountArr as $discount): ?>
                                                    <label style="width: fit-content" class="d-block mx-auto"><input type="radio" name="discountId" value="<?php echo $discount["id"];?>" <?php if($discount["id"] == $campaign['discount_id']) echo "checked";?>> <?php echo $discount['campaign'] === false ? $discount["discount"]."%" : $discount['campaign']['title']."(".$discount["discount"]."%)";?></label>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-3">Imagem</h1>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="file" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Guardar
                                    </button>
                                    <a href="<?php echo base_url("campanhas"); ?>" class="btn btn-dark btn-block">Voltar</a>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>