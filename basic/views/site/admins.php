<?php

/* @var $this yii\web\View */
/* @var $model app\models\AddBook */
/* @var $delete app\models\Delete */

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
        if (empty($authors))
            echo "Нет авторов";
        foreach ($authors as $author) {
            ?>
            <li>
                <strong><?=$author["name"]?></strong>
                <div style="display: flex; flex-direction: row">
                    <form method="post">
                        <input type="hidden" name="id" value="<?=$author["id"]?>">
                        <input type="hidden" name="name" value="<?=$author["name"]?>">
                        <button class="input_edit btn btn-primary" element=".authors_input">Редактировать</button>
                    </form>
                    <div style="    margin-top: -15px;">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'delete'
                        ]) ?>
                        <?= $form->field($delete, 'id')->hiddenInput(['value' => $author["id"]])->label(false); ?>
                        <?= $form->field($delete, 'element')->hiddenInput(['value' => 'authors'])->label(false); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary']) ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>

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
        if (empty($books))
            echo "Нет книг";

        foreach ($books  as $book) {
            ?>
            <li>
                <strong><?=$book["name"]?></strong>
                <div style="display: flex; flex-direction: row">

                <form action="">
                    <input type="hidden" name="id" value="<?=$book["id"]?>">
                    <input type="hidden" name="name" value="<?=$book["name"]?>">
                    <button class="input_edit btn btn-primary"  element=".book_input">Редактировать</button>
                </form>
                <div style="    margin-top: -15px;">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'delete'
                    ]) ?>
                    <?= $form->field($delete, 'id')->hiddenInput(['value' => $book["id"]])->label(false); ?>
                    <?= $form->field($delete, 'element')->hiddenInput(['value' => 'book'])->label(false); ?>
                    <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end() ?>
                </div>
                    </div>
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
        if (empty($library_list))
            echo "Нет книг";

        foreach ($library_list as $Author){
            ?>
            <li>
                <p>Автор <strong>"<?=$Author["A"]?>"</strong></p>
                <p>Книга  <?=$Author["B"]?></p>
            </li>
        <?php
        }
        ?>
    </ul>
    <h3>Список авторов с количеством книг</h3>
    <ul>
        <?php
        $authors = Yii::$app->db->createCommand("SELECT `authors`.`name`, id FROM `authors`")
            ->queryAll();
        if (empty($authors))
            echo "Нет книг";

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