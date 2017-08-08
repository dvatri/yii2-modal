# Bootstrap Modal wrapper for Yii2 framework

This module provides modal pop-over window for controller actions.

## Installation

Run to install extension:

	composer require tunect/yii2-modal

That's it, module will work. Additional settings are optional.

## Module settings

To specify module name (default name is `modal`) set it in index.php or in config file (before config goes to Application constructor):

	\tunect\Yii2Modal\Module::$moduleName = 'custom-modal';

Module settings can be changed in app config:

	'modules' => [
		'modal' => [
			'class' => 'tunect\Yii2Modal\Module',
		],
	],

To let some page be rendered in modal add widget to layout (e.g. right before `$this->endBody()`):

	<?= \tunect\Yii2Modal\Widget::widget() ?>

And add a link (`a` tag) or any other element with `showModalButton` class:

	<?= Html::a('Add product', ['/product/create'], ['class' => 'btn btn-primary showModalButton']) ?>

`href` attribute will be used for `a` elements to get Ajax request URL, `value` attribute for all other elements (tags).

To handle Ajax requests and render response in modal use JSON format:

	if (Yii::$app->request->isAjax) {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return [
			'status' => 200,
			'message' => $message, // Any html to be displayed in modal (e.g. yii\web\Controller::renderAjax() method output)
			'pjax' => "#products-list", // To reload pjax container wid id "products-list" (e.g. to reload grid after element creation in modal)
		];
	}
