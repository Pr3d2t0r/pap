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
                            <td><a href="<?php echo $campaign["href"]; ?>" target="popup" onclick="window.open('<?php echo str_replace("admin/", "", $campaign["href"]); ?>','popup','width=600'); return false;"><?php echo $campaign["href"]; ?></a></td>
                            <td><a href="<?php echo str_replace("admin/", "", base_url("resources/campaigns/".$campaign["thumbnail"])); ?>" target="popup" onclick="window.open('<?php echo str_replace("admin/", "", base_url("resources/images/campaigns/".$campaign["thumbnail"])); ?>); ?>','popup','height=600'); return false;">Ver imagem</a></td>
                            <td class="text-center">
                                <form action="<?php echo base_url("campaign/edit"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $campaign["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><i class="fa fa-edit text-warning"></i></button>
                                </form>
                            </td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("campaign/remove"); ?>" method="post" class="confirm">
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