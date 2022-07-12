<h1 class="h3 mb-2 text-gray-800">Produtos</h1>
<div class="d-flex flex-row-reverse">
    <a href="#" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($products)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem produtos</h6>
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
                    <th>Id</th>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product["id"]; ?></td>
                            <td><?php echo $product["reference"]; ?></td>
                            <td><?php echo $product["title"]; ?></td>
                            <td><?php echo $product["description"]; ?></td>
                            <td><?php echo $product["price"]; ?>€</td>
                            <td class="text-center">
                                <form action="<?php echo base_url("produto/edit"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><a href="#"><i class="fa fa-edit text-warning"></i></button>
                                </form>
                            </td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("produto/remove"); ?>">
                                    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
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