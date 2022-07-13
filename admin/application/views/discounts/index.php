<h1 class="h3 mb-2 text-gray-800">Descontos</h1>
<div class="d-flex flex-row-reverse">
    <a href="<?php echo base_url("desconto/add"); ?>" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($discounts)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem perguntas ferquentes</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perguntas Ferquentes</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Desconto</th>
                    <th>Campanha</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($discounts as $discount): ?>
                        <tr>
                            <td><?php echo $discount["id"]; ?></td>
                            <td><?php echo $discount["discount"]; ?></td>
                            <td><?php echo ($discount['campaign'] !== false ? $discount['campaign']['title'] : "N/A"); ?></td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("desconto/remove"); ?>">
                                    <input type="hidden" name="id" value="<?php echo $discount["id"]; ?>">
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