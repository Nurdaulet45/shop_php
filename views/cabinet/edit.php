<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-offset-4 padding-right">
                    <?php if($result): ?>
                        <p>Данные отредактированы</p>

                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)):?>
                            <ul><?php foreach ($errors as $error): ?>
                                    <li><?php echo $error;?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                        <ul></ul>
                        <div class="signup-form">
                            <h2>Редактировать данные</h2>
                            <form action="#" method="post">
                                <input type="text" name="name" placeholder="name" value="<?php $name; ?>"/>
                                <input type="email" name="email" placeholder="Email" value="<?php $email; ?>"/>
                                <input type="password" name="password" placeholder="Пароль" value="<?php $password;?>"/>
                                <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                            </form>
                        </div>
                    <?php endif ?>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>