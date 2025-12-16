<?php
    echo "<li clas='submenuunit'><a href='all>Все</a></li><br>";
    foreach($arr as $value) {
        echo "<li class='submenuunit'>
                <a href='category?id=".$value['id']."'>".$value['name']."</a>
            </li>
            <br>";
    }

?>