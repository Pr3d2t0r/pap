<h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
<div class="card shadow mb-4">
    <?php if (empty($pendingOrders)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem Pedidos Pendentes</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedidos Pendentes</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Loja</th>
                    <th>Total</th>
                    <th>Concluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingOrders as $order): ?>
                        <tr>
                            <td><?php echo $order["id"]; ?></td>
                            <td><?php echo $order["reference"]; ?></td>
                            <td><?php echo $order["cliente"]['first_name'] . ' ' . $order["cliente"]['last_name']; ?></td>
                            <td><?php echo $order["statusMsg"]; ?></td>
                            <td><?php echo $order["store"]['address']; ?></td>
                            <td><?php echo number_format($order["total"] ?? 0, 2); ?>€</td>
                            <td class="text-center ">
                                <form action="<?php echo base_url("order/process"); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $order["id"]; ?>">
                                    <button type="submit" class="btn btn-outline-warning"><i class="fa fa-truck"></i> Processado</button>
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

<div class="card shadow mb-4">
    <?php if (empty($orders)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Não existem Pedidos Processados</h6>
        </div>
    <?php else: ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedidos Processados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Loja</th>
                        <th>Total</th>
                        <th>Concluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order["id"]; ?></td>
                            <td><?php echo $order["reference"]; ?></td>
                            <td><?php echo $order["cliente"]['first_name'] . ' ' . $order["cliente"]['last_name']; ?></td>
                            <td><?php echo $order["statusMsg"]; ?></td>
                            <td><?php echo $order["store"]['address']; ?></td>
                            <td><?php echo number_format($order["total"] ?? 0, 2); ?>€</td>
                            <td class="text-center text-success">
                                <?php if (!$order['sent']): ?>
                                    <form action="<?php echo base_url("order/send"); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $order["id"]; ?>">
                                        <button type="submit" class="btn btn-outline-warning"><i class="fa fa-truck"></i> Enviado</button>
                                    </form>
                                <?php else: ?>
                                    Concluido <i class="fa fa-check"></i>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>