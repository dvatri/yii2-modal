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
