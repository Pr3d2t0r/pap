<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 mb-4">Adicionar Desconto</h1>
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
                                    <label>Desconto(%): </label>
                                    <input class="form-control" type="text" name="discount" placeholder="Desconto(%)" value="<?php echo set_value("discount"); ?>">
                                </div>
                                <div class="form-group">
                                    <label>De:</label>
                                    <input class="form-control" type="date" name="starts_at" id="">
                                    <label class="mt-2">Até:</label>
                                    <input class="form-control" type="date" name="ends_at" id="">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Guardar
                                </button>
                                <a href="<?php echo base_url("descontos"); ?>" class="btn btn-dark btn-block">Voltar</a>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
