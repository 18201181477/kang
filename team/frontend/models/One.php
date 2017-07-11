<?php
namespace frontend\models;
use yii\db\ActiveRecord;
	class One extends ActiveRecord
	{
		public function getOrders()
		{
			$data=$this->hasMany(Order::className(),['customer_id'=>'id'])->asArray();
			return $data;
		}
	}
?>