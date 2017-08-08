<?php
namespace tunect\Yii2Modal;

class Asset extends \yii\web\AssetBundle
{
    public $basePath = '@tunect/yii2-modal';
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
