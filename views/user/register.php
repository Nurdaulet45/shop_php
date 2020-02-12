<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-offset-4 padding-right">
                <?php if ($result):?>
                    <p>Вы зарегистрированы!</p>
                <?php endif?>
                <?php if (isset($errors) && is_array($errors)):?>
                <ul><?php foreach ($errors as $error): ?>
                    <li><?php echo $error;?></li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>
                <ul></ul>
                <div class="signup-form">
                    <h2>Регистрация</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Имя"/>
                        <input type="email" name="email" placeholder="Email"/>
                        <input type="password" name="password" placeholder="Пароль"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Регистрация">
                    </form>
                </div>

                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>