# Bootstrap Modal wrapper for Yii2 framework

This module provides modal pop-over window for controller actions.

## Installation

Run CLI command to install extension:

	composer require tunect/yii2-modal

That's it, module will work. Additional settings are optional.

## Optional settings

To specify custom module name (default name is `modal`) set it in index.php or in config file (before config goes to Application constructor):

	\tunect\Yii2Modal\Module::$moduleName = 'custom-modal';

Module settings can be changed in app config:

	'modules' => [
		'modal' => [
			'class' => 'tunect\Yii2Modal\Module',
		],
	],

## Usage

To let some page be rendered in modal add widget to layout (e.g. right before `$this->endBody()`):

	<?= \tunect\Yii2Modal\Widget::widget() ?>

Widged should be added only once since it uses an id attribute (hence expected to be unique). Widged just adds basic empty elements to be filled and displayed on demand.

And add a link (`a` tag) or any other element with `showModalButton` class:

	<?= Html::a('Add product', ['/product/create'], ['class' => 'btn btn-primary showModalButton']) ?>

`href` attribute will be used for `a` elements to get Ajax request URL, `value` attribute for all other elements (tags).

E.g. `<a href="/some-url" class="showModalButton">Get modal</a>` is equal with `<button value="/some-url" class="showModalButton">Get modal</button>`, `some-url` response will be used to fill modal in both cases.

To handle Ajax requests and render response in modal use JSON format:

	if (Yii::$app->request->isAjax) {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return [
			'status' => 200,
			'message' => $message, // Any html to be displayed in modal (e.g. yii\web\Controller::renderAjax() method output)
			'pjax' => "#products-list", // To reload pjax container with id "products-list" (e.g. grid after element creation in modal)
		];
	}
