<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 09.03.18
 * Time: 12:27
 */

namespace app\models;

use Yii;
use yii\base\Model;


class AddBook extends Model
{
    public $book;
    public $authors;

    
    public function rules()
    {
        return [
            // тут определяются правила валидации
        ];
    }
}