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
                                    <?php if (!empty($formError)): ?>
                                        <p class="text-danger small"><?php echo $formError; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($success)): ?>
                                        <p class="text-success small"><?php echo $success; ?></p>
                                    <?php endif; ?>
                                </div>
                                <form action="" method="post" class="user">
                                    <div class="form-group">
                                        <label>Nº de telefone </label>
                                        <input type="text" class="form-control"
                                               placeholder="Nº de telefone" name="phone_number" value="<?php echo $shop["phone_number"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>País </label>
                                        <input type="text" class="form-control"
                                               placeholder="País" name="country" value="<?php echo $shop["country"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Distrito </label>
                                        <input type="text" class="form-control"
                                               placeholder="Distrito" name="county" value="<?php echo $shop["county"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Cidade </label>
                                        <input type="text" class="form-control"
                                               placeholder="Cidade" name="city" value="<?php echo $shop["city"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Morada </label>
                                        <textarea name="address" rows="4" class="form-control" placeholder="Morada" style="resize: vertical" required><?php echo $shop["address"]; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Guardar
                                    </button>
                                    <a href="<?php echo base_url("faq"); ?>" class="btn btn-dark btn-block">Voltar</a>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>