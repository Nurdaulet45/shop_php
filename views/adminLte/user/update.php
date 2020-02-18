
<?php include(ROOT . '/views/layouts/admin_header.php');?>
    <section class="content-header">
        <h1>Управление категориями</h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard">  Админ панель</i></a></li>
            <li><a href="/admin/user">Управление пользователями</a></li>
            <li class="active">Редактировать пользователя</li>
        </ol>
    </section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">

                <br/>
                <h4>Редактировать пользователя #<?php echo $id; ?></h4>
                <br/>
                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">
                            <div class="form-group has-feedback">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?php echo $user['name']; ?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="<?php echo $user['email']; ?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                            </div>
                            <div class="form-group has-feedback">
                                <label for="role">Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1" <?php if ($user['role'] == 'admin') echo ' selected="selected"'; ?>>Админ</option>
                                    <option value="0" <?php if ($user['role'] == 'user') echo ' selected="selected"'; ?>>Пользователь</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>