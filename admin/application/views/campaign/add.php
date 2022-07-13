<div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Adicionar Campanha</h1>
                                </div>
                                <div class="text-center">
                                    <?php if (!empty($formError)): ?>
                                        <p class="text-danger small"><?php echo $formError; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($success)): ?>
                                        <p class="text-success small"><?php echo $success; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="text-center">
                                    <h1 class="h5 text-gray-900 mb-3">Informação Geral</h1>
                                </div>
                                <form action="" method="post" class="user">
                                    <div class="form-group">
                                        <label>Nome da Campanha: </label>
                                        <input type="text" class="form-control"
                                               placeholder="Nome" name="title" value="<?php echo set_value("title"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pequena descrição:</label>
                                        <textarea name="description" rows="6" class="form-control" placeholder="Descrição"><?php echo set_value("description"); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-0">Rederecionamento: </label>
                                        <p class="small text-left mb-2">(quando o user clicar em 'ver mais' será rederecionado para este link)</p>
                                        <input type="text" class="form-control"
                                               placeholder="Rederecionamento" name="href" value="<?php echo set_value("href"); ?>" required>
                                    </div>
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