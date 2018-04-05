<?php
namespace api\models;

use common\models\User;
use common\models\UserThirdInfo;
use Yii;
use yii\base\Model;

class WeiXinLoginForm extends Model
{
    public $openid;
    private $tokenExpired;

    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['openid'], 'string', 'max' => 60],
        ];
    }

    public function attributeLabels()
    {
        return [
            'openid' => '微信openid',
        ];
    }

    /**
     * 登录用户
     */
    public function login()
    {
        $openid = $this->openid;
        $thirdInfo = UserThirdInfo::findOne(['openid' => $openid]);

        if (!$thirdInfo) {
            return false;
        } else {
            $user = new User();
            $this->tokenExpired = strtotime('+3 year');
            $user->refreshUserAccessToken($this->tokenExpired);
            return $user->save() ? $user : false;
        }
    }

    public function getTokenExpired()
    {
        return $this->tokenExpired;
    }
}
