<h1 class="h3 mb-2 text-gray-800">Gestão de Stock</h1>
<div class="d-flex flex-row-reverse">
    <a href="<?php echo base_url("loja/add"); ?>" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($stock)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existe stock nesta loja</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Produtos</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Quantidade Disponivel</th>
                    <th>Adicionar</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($stock as $item): ?>
                        <tr>
                            <td><?php echo $item["product"]["reference"]; ?></td>
                            <td><?php echo $item["product"]["title"]; ?></td>
                            <td><?php echo $item["quantity"]; ?></td>
                            <td><?php echo $item["available_quantity"]; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url("loja/".$item['shop_id']."/add/stock"); ?>" class="text-success"><i class="fa fa-plus-circle fa-2x"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>