<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-offset-4 padding-right">
                    <h2 class="title text-center">Корзина</h2>
                    <?php if ($result):?>
                        <p>Заказ оформлен. Мы вам перезвоним.</p>
                    <?php else:?>
                        <p>Выбрано товар: <?php echo $totalQuantity; ?>, на сумму
                            <?php echo $totalPrice; ?>, тг</p><br/>
                        <?php if (!$result): ?>
                            <div class="col-sm-4">
                                <?php if (isset($errors) && is_array($errors)):?>
                                    <ul><?php foreach ($errors as $error): ?>
                                            <li><?php echo $error;?></li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>
                            </div>


                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">
                                    <p>Ваша имя</p>
                                    <input type="text" name="userName" placeholder="Имя"/>
                                    <p>Номер телефона</p>
                                    <input type="phone" name="userPhone"/>
                                    <p>Комментарий к заказу</p>
                                    <input type="text" name="userComment" placeholder="Сообщение"/>
                                    <input type="submit" name="submit" class="btn btn-default" value="Оформить">
                                </form>
                            </div>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>