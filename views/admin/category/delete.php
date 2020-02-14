<?php include(ROOT . '/views/layouts/header_admin.php');?>
    <section>
        <div class="container">
            <div class="row ">
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumbs">
                        <li><a href="/admin">Админ панель</a></li>
                        <li><a href="/admin/category">Управление категориями</a></li>
                        <li class="active">Удалить категорию</li>
                    </ol>
                </div>
                <h4>Удалить категорию №<?php echo $id;?></h4>
                <p>Вы действително хотите уд категорию</p>
                <form method="post">
                    <input type="submit" name="submit" value="Удалить"/>
                </form>

            </div>
        </div>
    </section>



<?php include ROOT . '/views/layouts/footer_admin.php';?>