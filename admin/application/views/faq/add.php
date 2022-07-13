<div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Adicionar Pergunta/Resposta</h1>
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
                                        <label>Pergunta: </label>
                                        <textarea name="question" rows="2" class="form-control" placeholder="Pergunta" style="resize: none" required><?php echo set_value("description"); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Resposta:</label>
                                        <textarea name="response" rows="4" class="form-control" placeholder="Resposta" style="resize: vertical" required><?php echo set_value("description"); ?></textarea>
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