<?php
namespace frontend\controllers;
use yii\web\Controller;
class IndexController extends Controller
{
	public $layout='common1';
	public function actionIndex()
	{
		return $this->render('index');
	}
	public function actionCompany()
	{
		echo 1;
	}
}
?>