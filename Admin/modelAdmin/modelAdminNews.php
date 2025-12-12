<?php
class modelAdminNews {
    public static function getNewsList() {
        $query = "SELECT 
            new.*, 
            category.name AS category_name, 
            user.name AS author_name
          FROM new
          JOIN category ON new.category_id = category.id
          JOIN user ON new.user_id = user.id
          ORDER BY new.id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getNewsAdd() {
        $test = false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])) {
                $title = $_POST['title'];
                $text = $_POST['text'];
                $idCategory = $_POST['idCategory'];

                // $image = addslashes(file_get_contents($_FILES['picture'] ['tmp_name']));
                $image = null;
                if(isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                    $image = file_get_contents($_FILES['picture']['tmp_name']);
                }

                $sql = "INSERT INTO `new` (`id`, `title` , `text`, `picture`, `category_id`, `user_id`) VALUES (NULL, '$title', ' $text', '$image', '$idCategory', '1')";
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }
}