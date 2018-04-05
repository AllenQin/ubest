<?php
namespace api\controllers;

use api\models\SignupForm;
use api\models\WeiXinLoginForm;
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
    public function actionWeiXinLogin()
    {
        if (!$this->isPost()) {
            return $this->badRequestMethod();
        }

        $post = $this->getAllPost();
        $WeiXin = new WeiXinLoginForm();
        if ($WeiXin->load($post, '')) {
            if ($user = $WeiXin->login()) {
                $token = $user->token .'-'. $WeiXin->getTokenExpired();
            } else {
                // 注册用户
                $SignupForm = new SignupForm();
                if ($SignupForm->load($post, '') && ($user = $SignupForm->signUp())) {
                    $token = $user->token . '-' . $SignupForm->getTokenExpired();
                } else {
                    $errors = array_values($SignupForm->getErrors());
                    $error = $errors[0][0];
                    return $this->error(Code::UNDEFINED_ERROR, $error);
                }
            }
            return $this->success(['token' => $token]);
        } else {
            return $this->error(Code::UNDEFINED_ERROR, '微信openid不能为空');
        }
    }
}
