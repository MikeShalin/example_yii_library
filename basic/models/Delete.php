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


class Delete extends Model
{
    public $id;
    public $element;

    public function rules()
    {
        return [
            // тут определяются правила валидации
        ];
    }
}