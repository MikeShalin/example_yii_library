<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10.03.18
 * Time: 10:55
 */
namespace app\controllers;

use yii\rest\ActiveController;

class LibraryController extends ActiveController
{
    public $modelClass = 'app\models\Library';

    protected function verbs()
    {
        return [
//            'index' => ['GET', 'HEAD'],
//            'view' => ['GET', 'HEAD'],
//            'create' => ['POST'],
            'update' => ['POST'],
//            'delete' => ['DELETE'],
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

        return $actions;
    }
    public function actionUpdate()
    {
//        return 'lol';
        if (isset($_POST)){
            $result = "SELECT `authors`.`name` AS `Author`, book.`name` AS `Book` FROM binding INNER JOIN book INNER JOIN `authors` WHERE binding.authors_id = `authors`.`id` AND binding.book_id = `book`.`id` AND book.id = " . $_POST["id"];
            $result = \Yii::$app->db->createCommand($result)->queryAll();
            return $result;
        }
//        if ($_POST["id"] && $_POST["name"]){
//            return $_POST["name"];
//        } else{
            return 'lol';
//
//        }
    }
}
