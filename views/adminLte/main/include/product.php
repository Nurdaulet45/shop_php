<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Последние добавленные продукты</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                <?php foreach ($lastProduct as $product):?>
                <li class="item">
                    <div class="product-img">
                        <?php if(!empty($product['image'])): ?>
                        <img src="<?php Product::getImage($product['image'])?>" alt="image">
                        <?php endif;?>
                    </div>
                    <div class="product-info">
                        <a href="/admin/product/edit/<?php echo $product['id']; ?>" class="product-title"><?php echo $product['name']?>
                            <span class="label label-warning pull-right"><?php echo $product['price']; ?></span></a>
                        <span class="product-description"><?php echo $product['description']; ?>></span>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="box-footer clearfix">
            <a href="/admin/product/" class="btn btn-sm btn-info btn-flat pull-left">Все продукты</a>
        </div>
    </div>
</div>
