<?php ob_start() ?>

<div class="conteiner" style="min-height: 400px;">
    <div class="col-md-11">

    <h2>Удаление новости</h2>

    <?php
        if(isset($test)) {
            if($test==true) {
    ?>

    <div class="alert alert-info">
        <strong>Запись удалена.</strong> <a href="newsAdmin">Список новостей</a>
    </div>

    <?php
        } elseif ($test==false) {
    ?>

    <div class="alert alert-warning">
        <strong>Ошибка удаления записи!</strong> <a href="newsAdmin">Список новостей</a>
    </div>

    <?php
            }
        } else {
    ?>

    <form action="newsDelResult?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <td>Заголовок новостей</td>
                <td><input type="text" name="title" class="form-control" required value="<?php echo $detail['title']; ?>"></td>
            </tr>
            <tr>
                <td>Новостной текст</td>
                <td><textarea name="text" rows="5" class="form-control" required><?php echo $detail['text']; ?></textarea> </td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>
                    <select name="idCategory" class="form-control">
                        <?php
                        foreach($arr as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            if($row['id'] == $detail['category_id']) echo 'selected';
                            echo '>'.$row['name'].'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <td>Старая картинка</td>
            <td><div>
                <?php echo '<img src="data:img/jpg;base64,'.base64_encode($detail['picture']).'" width = 150 />'; ?>
            </div></td>
            <tr>
                <td>Картинка</td>
                <td><div>
                    <input type=file name="picture" style="color:black;">
                </div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="save">
                        <span class="glyphicon glyphicon-plus"></span> Удалить
                    </button>
                    <a href="newsAdmin" class="btn btn-large btn-success">
                        <i class="glyphicon glyphicon-backward"></i> &nbsp; Назад к списку
                    </a>
                </td>
            </tr>
        </table>
    </form>
    
    <?php
        }
    ?>
    </div>
</div>

<?php
    $content = ob_get_clean();
    include "viewAdmin/templates/layout.php";
?>