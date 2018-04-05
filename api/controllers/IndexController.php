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
class IndexController extends ApiController
{
    public function actionIndex()
    {
        if (!$this->isGet()) {
            return $this->badRequestMethod();
        }

        if ($this->isGuest()) {
            return $this->noAuth();
        }

        return $this->success();
    }
}
