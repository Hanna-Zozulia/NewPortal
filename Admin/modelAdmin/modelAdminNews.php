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

                $image = addslashes(file_get_contents($_FILES['picture'] ['tmp_name']));
                // $image = null;
                // if(isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                //     $image = file_get_contents($_FILES['picture']['tmp_name']);
                // }

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

    public static function getNewsDetail($id) {
        $query = "SELECT new.*, category.name, user.name FROM new, category, user WHERE new.category_id=category.id AND new.user_id= user.id AND new.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getNewsEdit($id) {
        $test = false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])) {
                $title = $_POST['title'];
                $text = $_POST['text'];
                $idCategory = $_POST['idCategory'];
                $image = $_FILES['picture']['name'];
                if($image != "") {
                    $image = addslashes(file_get_contents($_FILES['picture'] ['tmp_name']));
                }

                if($image == "") {
                    $sql = "UPDATE `new` SET `title` = '$title', `text` = '$text', `category_id` = '$idCategory' WHERE `new`.`id` = ".$id;

                } else {
                    $sql = "UPDATE `new` SET `title` = '$title', `text` = '$text', `picture` = '$image', `category_id` = '$idCategory' WHERE `new`.`id` = ".$id;
                }

                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }

    public static function getNewsDelete($id) {
        $test = false;
        if (isset($_POST['save'])) {
            $sql = "DELETE FROM `new` EHERE `new`.`id` = ".$id;
            $db = new Database();
            $item = $db->executeRun($sql);
            if($item == true) {
                $test = true;
            }
        }
        return $test;
    }
}