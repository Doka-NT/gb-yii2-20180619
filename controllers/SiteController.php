<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Product;
use app\models\Reviews;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	\ob_start();

//		$query = new Query();
//		$query
//			->select(['r.id', 'r.product_id', 'r.text'])
//			->from(['r' => '{{%reviews}}'])
//			->where('id < 5')
//			->indexBy(function ($row) {
//				return 'review-' . $row['id'];
//			})
//			->join('inner join', ['p' => 'product'], 'r.product_id = p.id')
			// WHERE id < 5 AND text LIKE '%was%' OR text LIKE '%have%'
//			->andWhere([
//				'or',
//				['like', 'text', 'was'],
//				['like', 'text', 'have'],
//			])
//			->andFilterWhere([
//				'id' => 5,
//				'text' => $_GET['text'] ?? ''
//			])
//			->groupBy('product_id, id, text')
//		;

//		var_dump(\Yii::$app->db->createCommand('SELECT 50')->queryScalar());

//		\var_dump($query->createCommand()->getRawSql());

//		foreach ($query->each() as $row) {
//			\var_dump($row);
//		}
//		$review = $query->all();
//
//		\var_dump($review);


//		\Yii::$app->db->createCommand()->update('reviews', [
//			'product_id' => 9999,
//			'text' => 'foo text bar',
//		], ['id' => 101])->execute();

//		\Yii::$app->db->transaction(function ($db) {
//			$db->createCommand()->delete('reviews', 'id = 101')->execute();
//		});
//
//		$transaction = \Yii::$app->db->beginTransaction();
//
//		try {
//			\Yii::$app->db->createCommand()->delete('reviews', 'id = 101')->execute();
//			$transaction->commit();
//		} catch (\Exception $e) {
//			$transaction->rollBack();
//
//			$this->addLog($e);
//		}



//		\Yii::$app->db->createCommand()->batchInsert('reviews', [
//			'product_id', 'text',
//		], [
//			[8888, 'foo text'],
//			[9999, 'bar text'],
//		])->execute();

//		$review = Reviews::find()->indexBy('id')->one();
////		$review = new Reviews();
//		\var_dump($review->product->name);
//
////		$review->text = 'foo';
////		$review->isAttributeChanged('text');
//
//		$
//		$review->product->name = 'fofofofbar';
//		$review->product->save();
//
//
//
//		$review->save();


		$product = new Product();
		$product->setAttributes(
			[
				'name' => 'fofofofo',
				'count' => '100',
				'email_provider' => '123@foo.com',
				'provider_id' => '9999',
				'created' => '2018-06-26',
			]
		);

//		$product->save();
//
//		$reviews = new Reviews();
//		$reviews->text = 'foo text';
//
//		$reviews->save();
//		$reviews->link('product', $product);


		$review = Reviews::find()
//			->andWhere(['id' => 104])
			->with('product')
			->one();

		\var_dump($review);

//		$review->delete();

		$content = \ob_get_clean();

        return $this->render('index', [
        	'content' => $content,
		]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
