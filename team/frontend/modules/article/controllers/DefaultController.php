<?php

namespace frontend\modules\article\controllers;

use yii\web\Controller;

/**
 * Default controller for the `article` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	echo 'helo article';die;
        return $this->render('index');
    }
}
