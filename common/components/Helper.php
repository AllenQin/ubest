<?php
namespace common\components;

use Yii;
use \yii\base\Component;

class Helper extends Component
{
    public static function validateMobile($phone)
    {
        return preg_match("/^1[34578]\d{9}$/", $phone);
    }
}