<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//$sql = new Sql();
$this->title = 'Home';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <?php
        $library_list = Yii::$app->db->createCommand("SELECT `authors`.`name` AS A,book.`name` AS B FROM binding INNER JOIN book INNER JOIN `authors` WHERE binding.authors_id = `authors`.`id` AND binding.book_id = `book`.`id`")
            ->queryAll();

        foreach ($library_list as $Author){
            ?>
            <li>
                <p>Автор <?=$Author["A"]?></p>
                <p>Книга  <strong>"<?=$Author["B"]?>"</strong></p>
            </li>
            <?php
        }
        ?>
    </ul>


</div>