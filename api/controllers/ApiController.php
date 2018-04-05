<?php
namespace api\controllers;

use common\models\UserLoginRecord;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use api\define\Code;
use common\models\RewardRules;
use common\models\Wallets;

/**
 * Api 基础类
 */

class ApiController extends Controller
{
    // api接口取消_csrf验证
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
        Yii::$app->response->format = Response::FORMAT_JSON;

        // 验证HEAD token
        Yii::$app->verifyIdentity->verify();

        // 后续扩展逻辑
        // $this->bootstrap();
    }

    /**
     * 成功返回内容
     *
     * @param $data
     * @param int $code
     * @return array
     */
    protected function success($data = [])
    {
        return [
            'code' => Code::REQUEST_SUCCESS,
            'data' => $data ? : new \stdClass(),
            'msg' => '',
        ];

        exit();
    }

    /**
     * 失败返回内容
     *
     * @param int $code
     * @param string $msg
     * @return array
     */
    protected function error($code = Code::REQUEST_ERROR, $msg = '')
    {
        return [
            'code' => $code,
            'data' => new \stdClass(),
            'msg' => $msg,
        ];

        exit();
    }

    /**
     * 需要登录
     * @return array
     */
    protected function noAuth()
    {
        return $this->error(Code::NEED_LOGIN, '请先登录');
        exit();
    }

    /**
     * 错误的请求方式
     */
    protected function badRequestMethod()
    {
        return $this->error(Code::BAD_REQUEST, '不支持的请求方式');
        exit();
    }

    /**
     * 返回第一条错误
     *
     * @param $model
     * @return array
     */
    protected function getFirstError($model)
    {
        if ($model->getErrors()) {
            return array_values(array_shift($model->getErrors()))[0];
        }

        return [];
    }

    /**
     * 判断请求方式是否为GET
     *
     * @return mixed
     */
    protected function isGet()
    {
        return Yii::$app->request->isGet;
    }

    /**
     * 判断请求方式是否为POST
     *
     * @return mixed
     */
    protected function isPost()
    {
        return Yii::$app->request->isPost;
    }

    /**
     * 判断当前用户身份是否是游客
     *
     * @return bool
     */
    protected function isGuest()
    {
        return Yii::$app->user->isGuest;
    }

    protected function getUser()
    {
        return Yii::$app->user;
    }

    protected function getUserId()
    {
        return Yii::$app->user->getId();
    }

    /**
     * 其他操作操作
     */
    private function bootstrap()
    {

    }

    protected function getQuery($field, $default = 0)
    {
        return Yii::$app->request->get($field, $default);
    }

    protected function getPost($field, $default = 0)
    {
        return Yii::$app->request->post($field, $default);
    }

    protected function getAllQuery()
    {
        return Yii::$app->request->get();
    }

    protected function getAllPost()
    {
        return Yii::$app->request->post();
    }
}
