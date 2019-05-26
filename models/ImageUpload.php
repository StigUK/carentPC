<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;
    public $folder;

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadImage(UploadedFile $file, $currentImage)
    {
        $this->image = $file;
        if($this->validate())
        {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    private function getFolder()
    {
        if($this->folder=='car')
        {
            return Yii::getAlias('@web').'uploads/CarModels/';
        }
        if($this->folder=='user')
        {
            return Yii::getAlias('@web').'uploads/User/';
        }

    }

    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage)
    {
        if($currentImage!=null)
        if(file_exists($this->getFolder().$currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    private function fileExists($currentImage)
    {
        return file_exists($this->getFolder().$currentImage);
    }

    private function saveImage()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder().$filename);
        return $filename;
    }
}