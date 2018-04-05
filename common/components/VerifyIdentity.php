<?php
namespace common\components;

use Yii;
use yii\base\Component;
use common\models\User;

class VerifyIdentity extends Component
{
    public function verify()
    {
        $headers = Yii::$app->request->headers;
        if ($tokenString = $headers->get('token')) {
            if (strpos($tokenString, '-') === false) {
                return false;
            }

            list($token, $expireTime) = explode('-', $tokenString);
            if (time() > $expireTime) {
                return false;
            }

            $user = User::findIdentityByAccessToken($token);
            if (!$user || md5($user->auth_key . $user->username . $expireTime . 'ubest_') != $token
                || $user->status == $user::STATUS_DELETED) {
                return false;
            }

            Yii::$app->getUser()->login($user);
        }
    }
}