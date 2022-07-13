<h1 class="h3 mb-2 text-gray-800">Lojas</h1>
<div class="d-flex flex-row-reverse">
    <a href="<?php echo base_url("loja/add"); ?>" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($shops)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem lojas</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lojas</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nº Telefone</th>
                    <th>País</th>
                    <th>Distrito</th>
                    <th>Cidade</th>
                    <th>Morrada</th>
                    <th>Stock</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($shops as $shop): ?>
                        <tr>
                            <td><?php echo $shop["id"]; ?></td>
                            <td><?php echo $shop["phone_number"]; ?></td>
                            <td><?php echo $shop["country"]; ?></td>
                            <td><?php echo $shop["county"]; ?></td>
                            <td><?php echo $shop["city"]; ?></td>
                            <td><?php echo $shop["address"]; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url("loja/".$shop['id']."/stock"); ?>" class="mr-3 text-dark"><i class="fa fa-eye fa-2x"></i></a>
                                <a href="<?php echo base_url("loja/".$shop['id']."/add/stock"); ?>" class="text-warning"><i class="fa fa-plus-circle fa-2x"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="<?php echo base_url("loja/edit"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $shop["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><a href="#"><i class="fa fa-edit fa-2x text-warning"></i></button>
                                </form>
                            </td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("loja/remove"); ?>">
                                    <input type="hidden" name="id" value="<?php echo $shop["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><i class="fa fa-trash fa-2x text-danger"></i></button>
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