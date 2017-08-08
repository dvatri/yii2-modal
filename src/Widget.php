<?php
namespace tunect\Yii2Modal;

use yii\base\Widget;
use yii\bootstrap\Modal;

/**
 * $assets \yii\web\AssetBundle
 */
class Widget extends Widget
{
	private $assets;

    public function init()
    {
        parent::init();
		$this->assets = Asset::register(\Yii::$app->getView());
    }

    public function run()
    {
        ob_start();
		Modal::begin([
			'header' => '<span id="modalHeaderTitle"></span>',
			'headerOptions' => ['id' => 'modalHeader'],
			'id' => 'modal',
			'size' => 'modal-lg',
			'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
		]);
		echo '<div id="modalContent"><div style="text-align:center"><img src="' . $this->assets->baseUrl . '/assets/loader.gif"></div></div>';
		Modal::end();
		return ob_get_clean();
    }
}