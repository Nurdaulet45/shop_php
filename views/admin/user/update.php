<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/order">Управление пользователями</a></li>
                        <li class="active">Редактировать пользователя</li>
                    </ol>
                </div>


                <h4>Редактировать пользователя #<?php echo $id; ?></h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Имя пользователя</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                            <p>Email</p>
                            <input type="text" name="email" placeholder="" value="<?php echo $user['email']; ?>">

                            <p>Роль</p>
                            <select name="role">
                                <option value="1" <?php if ($user['role'] == 'admin') echo ' selected="selected"'; ?>>Админ</option>
                                <option value="0" <?php if ($user['role'] == 'user') echo ' selected="selected"'; ?>>Пользователь</option>
                            </select>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>