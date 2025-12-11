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
}