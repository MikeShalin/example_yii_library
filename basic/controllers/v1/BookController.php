<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10.03.18
 * Time: 10:55
 */
namespace app\controllers\v1;

use yii\rest\ActiveController;

class BookController extends ActiveController
{
    public $modelClass = 'app\models\Book';

    protected function verbs()
    {
        return [
            'update' => ['POST'],
        ];
    }

    public function actionList()
    {
        $library_list = \Yii::$app->db->createCommand("SELECT `authors`.`name` AS `Author`,book.`name` AS `Book` FROM binding INNER JOIN book INNER JOIN `authors` WHERE binding.authors_id = `authors`.`id` AND binding.book_id = `book`.`id`")
            ->queryAll();
        return $library_list;
    }

    public function actionById()
    {
        if($_GET["id"]){
            $result = "SELECT `authors`.`name` AS `Author`, book.`name` AS `Book` FROM binding INNER JOIN book INNER JOIN `authors` WHERE binding.authors_id = `authors`.`id` AND binding.book_id = `book`.`id` AND book.id = " . $_GET["id"];
            $result = \Yii::$app->db->createCommand($result)->queryAll();
            return $result;
        } else {
            return 'send query id';
        }
    }
    public function actions()
    {
        $actions = parent::actions();

        unset($actions['update']);
        unset($actions['delete']);

        return $actions;
    }
    public function actionUpdate()
    {
        if (isset($_POST["id"]) && isset($_POST["name"])){
            $result = \Yii::$app->db->createCommand()->update('book', ['name' => $_POST["name"]], 'id = ' . $_POST["id"])->execute();
            return $result;
        } else {
            return 'send query id or name';

        }
    }
    public function actionDelete()
    {
        if($_GET["id"]){
            $delete_book = \Yii::$app->db->createCommand()->delete('book', 'id = ' . $_GET["id"])->execute();
            $delete_binding = \Yii::$app->db->createCommand()->delete('binding', 'book_id = ' . $_GET["id"])->execute();
            return [
                "delete book"=>($delete_book === 0)?"Нет записи в таблице book":$delete_book,
                "delete_binding"=>($delete_binding === 0)?"Нет записи в таблице book":$delete_binding,
            ];
        }  else {
            return 'send query id';

        }
    }
}
