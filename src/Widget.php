<?php
namespace tunect\Yii2Modal;

use yii\bootstrap\Modal;

/**
 * $assets \yii\web\AssetBundle
 */
class Widget extends \yii\base\Widget
{
	private $assets;

    public function init()
    {
        parent::init();
		$this->assets = Asset::register(\Yii::$app->getView());
		$this->view->registerJs('tunect_assets_path = "' . $this->assets->baseUrl . '";');
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