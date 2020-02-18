<?php include(ROOT . '/views/layouts/header.php'); ?>
<section>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categoryList as $categoryItem) {?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?></a></h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>


<!--            --><?php
/*            if (isset($_POST['search'])): {
                $searchKey = trim($_POST['search']);
                $db = Db::getConnection();
                $sql = "SELECT * FROM product WHERE description LIKE '%$searchKey%' LIMIT 10";
                $result = $db->prepare($sql);
                $result->bindValue(1, "%$searchKey%", PDO::PARAM_STR);
                $result->execute();

                $products = array();
                $i = 0;

                while ($row = $result->fetch()) {
                    $products[$i]['id'] = $row['id'];
                    $products[$i]['name'] = $row['name'];
                    $products[$i]['image'] = $row['image'];
                    $products[$i]['price'] = $row['price'];
                    $products[$i]['is_new'] = $row['is_new'];
                    $i++;

                }
            }
            */?>
<!--            <div class="col-sm-9 padding-right">-->
<!--                <div class="features_items"><--features_items-->
<!--                    <h2 class="title text-center">Shop/index Последние товары</h2>-->
<!--                    --><?php //foreach ($products as $productItem):?>
<!--                        <div class="col-sm-4">-->
<!--                            <div class="product-image-wrapper">-->
<!--                                <div class="single-products">-->
<!--                                    <div class="productinfo text-center">-->
<!--                                        <img src="--><?php //echo Product::getImage($productItem['image']) ;?><!--" style="width: 200px; height: 150px;" alt="" />-->
<!--                                        <h2>$--><?php //echo $productItem['price']; ?><!--</h2>-->
<!--                                        <p><a href="/product/--><?php //echo $productItem['id'];?><!--">--><?php //echo $productItem['name']; ?><!--</a></p>-->
<!--                                        <a href="/cart/add/--><?php //echo $productItem['id'];?><!--"-->
<!--                                           class="btn btn-default add-to-cart" data-id="--><?php //echo $productItem['id']; ?><!--">-->
<!--                                            <i class="fa fa-shopping-cart"></i>В корзину</a>-->
<!--                                    </div>-->
<!--                                    --><?php //if ($productItem['is_new']):?>
<!--                                        <img src="/template/images/home/new.png" class="new" alt=""/>-->
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach?>
<!--                </div><--features_items-->
<!--                <?php /*elseif (isset($_POST['search'])): {
                    $searchKey = trim($_POST['search']);
                    $db = Db::getConnection();
                    $sql = "SELECT * FROM product WHERE description LIKE '%$searchKey%' LIMIT 10";
                    $result = $db->prepare($sql);
                    $result->bindValue(1, "%$searchKey%", PDO::PARAM_STR);
                    $result->execute();
                    if (count($result) == 0){ echo "Не найден";

                    }
                }

                */?>
            --><?php /*else: */?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Shop/index Последние товары</h2>
                    <?php foreach ($productList as $productItem):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo Product::getImage($productItem['image']) ;?>" style="width: 200px; height: 150px;" alt="" />
                                        <h2>$<?php echo $productItem['price']; ?></h2>
                                        <p><a href="/product/<?php echo $productItem['id'];?>"><?php echo $productItem['name']; ?></a></p>
                                        <a href="/cart/add/<?php echo $productItem['id'];?>"
                                           class="btn btn-default add-to-cart" data-id="<?php echo $productItem['id']; ?>">
                                            <i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if ($productItem['is_new']):?>
                                        <img src="/template/images/home/new.png" class="new" alt=""/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach?>
                </div><!--features_items-->
           <!-- --><?php /*endif;*/?>




                <div><?php echo $paginationSite->get(); ?></div>

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php';?>

