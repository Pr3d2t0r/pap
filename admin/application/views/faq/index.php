<h1 class="h3 mb-2 text-gray-800">Perguntas Ferquentes</h1>
<div class="d-flex flex-row-reverse">
    <a href="<?php echo base_url("faq/add"); ?>" class="m-2"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<div class="card shadow mb-4">
    <?php if (empty($questions)): ?>
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
                    <th>Pergunta</th>
                    <th>Resposta</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($questions as $question): ?>
                        <tr>
                            <td><?php echo $question["id"]; ?></td>
                            <td><?php echo $question["question"]; ?></td>
                            <td><?php echo $question["response"]; ?></td>
                            <td><?php echo $question["status"]=="active" ? "ativo" : "inativo"; ?></td>
                            <td class="text-center">
                                <form action="<?php echo base_url("faq/edit"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $question["id"]; ?>">
                                    <button type="submit" class="btn bg-white"><a href="#"><i class="fa fa-edit text-warning"></i></button>
                                </form>
                            </td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("faq/remove"); ?>" class="cofirm" method="post">
                                    <input type="hidden" name="id" value="<?php echo $question["id"]; ?>">
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