<?php
namespace tunect\Yii2Modal;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $name = Module::$moduleName;

		if (!$app->hasModule($name)) {
			$app->setModule($name, new Module($name));
		}
    }
}
