<?php
namespace api\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $phone;
    public $password;
}