<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AddBook;
use app\models\Edit;
use app\models\Delete;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('admins');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdmins()
    {
        $sql = Yii::$app->db;
        $sql_query = $sql->createCommand();
        $model = new AddBook();
        if ($model->load(Yii::$app->request->post())){
            $id = [];
            $authors = $sql->createCommand("SELECT * FROM `authors`")->queryAll();
            foreach ($authors as $author){
                if($author['name'] === $_POST["AddBook"]["authors"]){
                    $id["authors"] = $author['id'];
                    break;
                }
            }
            if (empty($id)) {
                foreach ($_POST["AddBook"] as $key => $val) {
                    $sql_query->insert($key, [
                        'name' => $val
                    ])->execute();
                    $id[$key] = $sql->lastInsertID;
                }
                $sql_query->insert('binding', [
                    "authors_id" => intval($id["authors"]),
                    "book_id" => intval($id["book"])
                ])->execute();
                $id = [];
            } else {
                foreach ($_POST["AddBook"] as $key => $val) {
                    if($key !== "authors"){
                        $sql_query->insert($key, ['name' => $val])->execute();
                        $id[$key] = $sql->lastInsertID;
                    }
                }
                $sql_query->insert('binding', [
                    "authors_id" => $id["authors"],
                    "book_id" => intval($id["book"])
                ])->execute();
                $id = [];
            }
            return $this->redirect(['admins']);
        }
        $edit_author = new Edit();
        if ($edit_author->load(Yii::$app->request->post())){
            if (($_POST["Edit"]["authors"] === "" && $_POST["Edit"]["book"] === "" ) || ($_POST["Edit"]["authors"] !== "" && $_POST["Edit"]["book"] !== "")){
                return $this->redirect(['admins']);
            }
            $sql_query->update(($_POST["Edit"]["authors"] === "")?'book':'authors', ['name' => ($_POST["Edit"]["authors"] === "")?$_POST["Edit"]["book"]:$_POST["Edit"]["authors"]], "id = " . $_POST["Edit"]["id"])->execute();
            return $this->redirect(['admins']);
        }
        $delete = new Delete();
        if ($delete->load(Yii::$app->request->post())) {
            if ($_POST["Delete"]["element"] === 'authors'){
                $book_list = $sql->createCommand('SELECT `book_id` FROM binding WHERE authors_id=' . $_POST["Delete"]["id"])->queryAll();
                foreach ($book_list as $id){
                    $sql_query->delete("book", 'id = ' . intval($id["book_id"]))->execute();
                }
            }
            $sql_query->delete($_POST["Delete"]["element"], 'id = '.$_POST["Delete"]["id"])->execute();
            $sql_query->delete("binding", $_POST["Delete"]["element"].'_id = ' .$_POST["Delete"]["id"])->execute();
            return $this->redirect(['admins']);

        }
        $id = Yii::$app->user->id;
        if ($id === '100'){
            return $this->render('admins', [
                'model' => $model,
                'delete' =>$delete
            ]);
        } else {
            return $this->goHome();

        }

    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
}
