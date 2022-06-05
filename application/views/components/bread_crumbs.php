<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <?php $last = count($this->router->uri->segments);?>
                <li>
                    <a href="<?php echo base_url(); ?>">Home</a>
                    <i>|</i>
                </li>
                <?php foreach ($this->router->uri->segments as $i => $segment): ?>
                    <li>
                        <?php echo $segment; ?>
                        <?php if ($i != $last): ?>
                            <i>|</i>
                        <?php endif; ?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>