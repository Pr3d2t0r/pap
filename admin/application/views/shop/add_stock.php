<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 mb-4">Adicionar Stock</h1>
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
                                    <label>Produto </label>
                                    <select name="product_id" class="form-control" required>
                                        <option value="">Selecione um produto</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?php echo $product['id']; ?>">(#<?php echo $product['reference']; ?>) <?php echo $product['title']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantidade </label>
                                    <input type="text" class="form-control"
                                           placeholder="Quantidade" name="qt" value="<?php echo set_value("qt"); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Adicionar
                                </button>
                                <a href="<?php echo base_url("lojas"); ?>" class="btn btn-dark btn-block">Voltar</a>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>