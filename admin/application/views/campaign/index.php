<h1 class="h3 mb-2 text-gray-800">Campanhas</h1>
<div class="d-flex flex-row-reverse">
    <a href="<?php echo base_url("campanha/add"); ?>" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($campaigns)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem campanhas</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Campanhas</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Rederecionamento</th>
                    <th>Imagem</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($campaigns as $campaign): ?>
                        <tr>
                            <td><?php echo $campaign["title"]; ?></td>
                            <td><?php echo $campaign["description"]; ?></td>
                            <td><?php echo $campaign["href"]; ?></td>
                            <td><?php echo $campaign["thumbnail"]; ?></td>
                            <td class="text-center">
                                <form action="<?php echo base_url("campaign/edit"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $campaign["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><a href="#"><i class="fa fa-edit text-warning"></i></button>
                                </form>
                            </td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("campaign/remove"); ?>">
                                    <input type="hidden" name="id" value="<?php echo $campaign["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>