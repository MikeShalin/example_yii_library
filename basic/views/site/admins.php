<?php

/* @var $this yii\web\View */
/* @var $model app\models\AddBook */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

unset($_POST);
$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>CRUT</h3>
    <?php
    $form = ActiveForm::begin([
        'id' => 'admins-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>
    <?= $form->field($model, 'book')->textInput(['class' => 'book_input']) ?>
    <?= $form->field($model, 'authors')->textInput(['class' => 'authors_input']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить книгу', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <h2>Авторы</h2>
    <ul>
        <?php
        $authors = Yii::$app->db->createCommand("SELECT `authors`.`name`, id FROM `authors`")
            ->queryAll();
        foreach ($authors as $author) {
            ?>
            <li>
                <strong><?=$author["name"]?></strong>
                <form action="">
                    <input type="hidden" name="author_id" value="<?=$author["id"]?>">
                    <input type="hidden" name="author_name" value="<?=$author["name"]?>">
                    <button class="input_edit">Редактировать</button>
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </li>
        <?php
        }
        ?>
    </ul>
        <h2>Книги</h2>
    <ul>
        <?php
        $books = Yii::$app->db->createCommand("SELECT `book`.`name`, id FROM `book`")
            ->queryAll();
        foreach ($books  as $book) {
            ?>
            <li>
                <strong><?=$book["name"]?></strong>
                <form action="">
                    <input type="hidden" name="author_id" value="<?=$book["id"]?>">
                    <input type="submit" name="edit" value="Редактировать">
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </li>
            <?php
        }
        ?>
    </ul>
        <h3>Список книг</h3>
    <ul>
        <?php
        $library_list = Yii::$app->db->createCommand("SELECT `authors`.`name` AS A,book.`name` AS B FROM binding INNER JOIN book INNER JOIN `authors` WHERE binding.authors_id = `authors`.`id` AND binding.book_id = `book`.`id`")
            ->queryAll();

        foreach ($library_list as $Author){
            ?>
            <li>
                <p>Автор <strong>"<?=$Author["A"]?>"</strong></p>
                <p>Книга  <?=$Author["B"]?></p>
            </li>
<!--            --><?php
        }
        ?>
    </ul>
    <h3>Список авторов с количеством книг</h3>
    <ul>
        <?php
        $authors = Yii::$app->db->createCommand("SELECT `authors`.`name`, id FROM `authors`")
            ->queryAll();
        foreach ($authors as $author){
            $books_count = Yii::$app->db->createCommand("SELECT COUNT(*) AS c FROM `binding` WHERE `authors_id`=" . $author["id"])
                ->queryAll();
            ?>
            <li>
                <p>Автор <strong><?=$author["name"]?></strong> (<em><?=$books_count[0]["c"]?></em>)</p>
            </li>
            <?php
        }
        ?>
    </ul>

</div>