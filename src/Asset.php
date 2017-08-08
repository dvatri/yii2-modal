<?php
namespace tunect\Yii2Modal;

class Asset extends \yii\web\AssetBundle
{
    public $sourcePath  = '@tunect/Yii2Modal';
    public $baseUrl = '@web';

    public $js = [
        'assets/modal.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
		'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
