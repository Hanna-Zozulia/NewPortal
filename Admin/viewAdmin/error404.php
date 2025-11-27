<?php ob_start() ?>
<h2>Error 404</h2>
<article>
    <h3>404 ошибка - что это такое?</h3>
    <p>По запрашиваемому страница не найдена</p>
</article>
<?php 
    $content = ob_get_clean();
    include "viewAdmin/templates/layout.php";
?>