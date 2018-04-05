<?php
namespace api\models;

use common\models\UserBaseInfo;
use common\models\UserSetting;
use common\models\UserThirdInfo;
use Yii;
use yii\base\Model;
use common\models\User;

class SignupForm extends Model
{
    public $avatar;
    public $nickname;
    public $gender;
    public $openid;
    public $birthday;

    private $tokenExpiredTime;

    public function rules()
    {
        return [
            [['openid'], 'required'],
            ['nickname', 'trim'],
            ['nickname', 'string', 'min' => 2, 'max' => 20],
            [['avatar', 'nickname', 'gender', 'openid'], 'safe']
        ];
    }

    /**
     * 注册
     *
     * @return bool|User|null
     */
    public function signUp()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $this->tokenExpiredTime = strtotime("+3 year");
        $user->username = md5($this->openid);

        $user->setPassword(rand(100, 999).rand(111, 999).$user->username);
        $user->generateAuthKey();
        $user->generateUserAccessToken($user->username, $this->tokenExpiredTime);

        if ($user->save()) {
            // 开通其他信息
            $userInfo = new UserBaseInfo();
            $userInfo->uid = $user->id;
            $userInfo->avatar = $this->avatar;
            $userInfo->nickname = $this->nickname;
            $userInfo->birthday = $this->birthday;
            $userInfo->gender = $this->gender;

            // 第三方信息
            $userThirdInfo = new UserThirdInfo();
            $userThirdInfo->uid = $user->id;
            $userThirdInfo->openid = $this->openid;

            // 用户配置信息
            $userSetting = new UserSetting();
            $userSetting->uid = $user->id;
            $userSetting->display = 1;
            $userSetting->msg_tip = 1;

            if ($userInfo->save() && $userThirdInfo->save()
                && $userSetting->save()) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getTokenExpired()
    {
        return $this->tokenExpiredTime;
    }
}

