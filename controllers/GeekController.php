<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class GeekController extends Controller
{
	/**
	 * @return string
	 */
	public function actionIndex()
	{
		$model = new Product();

		$request = \Yii::$app->getRequest();

		if ($model->load($request->getBodyParams()) && $model->validate()) {
//			$model->created = date('Y-m-d H:i:s');
//			$model->provider_id = 100;
//			$model->email_provider = 'foo@example.com';

			$model->save(false);
		}

		return $this->render('index', [
			'model' => $model,
		]);
	}
}