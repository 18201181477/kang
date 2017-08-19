<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
class IndexController extends Controller
{
	public $layout='common';
	public function actionIndex()
	{
		return $this->render('index');
	}
}