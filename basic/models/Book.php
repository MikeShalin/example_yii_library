<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10.03.18
 * Time: 12:29
 */

namespace app\models;


class Book extends \yii\db\ActiveRecord
{
//    const STATUS_INACTIVE = 0;
//    const STATUS_ACTIVE = 1;

    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return '{{book}}';
    }
}
