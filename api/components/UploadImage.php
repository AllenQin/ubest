<?php
namespace api\components;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;

/**
 * 上传图片组件
 */
class UploadImage extends Component
{
    private $error;
    private $result;

    public function upload($name, $type = 'avatar')
    {
        $uploadedFile = UploadedFile::getInstanceByName($name);
        if ($uploadedFile === null || $uploadedFile->hasError) {
            $this->error = '图片文件不存在';
            return false;
        }

        $ymd = date('Ymd');
        $savePath = Yii::getAlias('@uploads') . '/' . $type . '/' . $ymd . '/';
        $saveUrl = 'uploads' . '/' . $type . '/' . $ymd . '/';
        if (!file_exists($savePath)) {
            mkdir($savePath, 0777, true);
        }

        $fileName = $uploadedFile->getBaseName();
        $fileExt = $uploadedFile->getExtension();
        $imageName = md5($savePath . Yii::$app->user->id . $fileName . date('YmdHis') . rand(1000, 9999));
        $newFileName = $imageName . '.' . $fileExt;

        $uploadedFile->saveAs($savePath . $newFileName);
        $this->result = [
            'path' => $savePath,
            'url' => $saveUrl,
            'name' => $newFileName,
            'ext' => $fileExt,
            'imageName' => $imageName,
        ];
        return true;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getResult()
    {
        return $this->result;
    }
}