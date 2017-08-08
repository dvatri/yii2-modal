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
        // http://www.yiiframework.com/wiki/806/render-form-in-popup-via-ajax-create-and-update-with-ajax-validation-also-load-any-page-via-ajax-yii-2-0-2-3/
        ob_start();
		Modal::begin([
			'header' => '<span id="modalHeaderTitle"></span>',
			'headerOptions' => ['id' => 'modalHeader'],
			'id' => 'modal',
			'size' => 'modal-lg',
			// keeps from closing modal with esc key or by clicking out of the modal.
			// user must click cancel or X to close
			'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
		]);
		echo '<div id="modalContent"><div style="text-align:center"><img src="' . $this->assets->baseUrl . '/assets/loader.gif"></div></div>';
		Modal::end();
		return ob_get_clean();
    }
}