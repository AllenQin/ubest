<?php
namespace api\controllers;

use common\models\UserSetting;
use Yii;
use api\define\Code;
use yii\web\Response;

/**
 * 设置页面
 *
 * Class IndexController
 * @package api\controllers
 */
class SettingController extends ApiController
{
    /**
     * 设置页面首页
     */
    public function actionIndex()
    {
        if (!$this->isGet()) {
            return $this->badRequestMethod();
        }

        if ($this->isGuest()) {
            return $this->noAuth();
        }

        $userId = $this->getUserId();
        $setting = UserSetting::findOne(['uid' => $userId]);

        if (!$setting) {
            return $this->error(Code::UNDEFINED_ERROR, '用户信息异常');
        }

        $data = [
            'sexual' => $setting->sexual,
            'msg_tip' => $setting->msg_tip,
        ];

        return $this->success($data);
    }

    /**
     * 更新设置
     */
    public function actionUpdate()
    {

    }
}
