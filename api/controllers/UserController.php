<?php
namespace api\controllers;

use Yii;
use api\define\Code;
use yii\web\Response;

/**
 * app 首页
 *
 * Class IndexController
 * @package api\controllers
 */
class UserController extends ApiController
{
    /**
     * 微信授权
     *
     * @return array
     */
    public function actionWeiXin()
    {
        if (!$this->isPost()) {
            return $this->badRequestMethod();
        }

        if ($this->isGuest()) {
            return $this->noAuth();
        }



        return $this->success();
    }
}
