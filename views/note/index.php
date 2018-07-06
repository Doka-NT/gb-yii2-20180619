<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use app\models\Access;
use app\objects\CheckNoteAccess;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Note;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			[
				'class' => SerialColumn::class,
			],

            'id',
            'text:ntext',
			'author.name',
            'date_create',

			[
				'class' => ActionColumn::class,
				'buttons' => [
					'update' => function ($url, Note $model) {
						return (new CheckNoteAccess)->execute($model) === Access::LEVEL_EDIT
							? Html::a('Update', $url)
							: '';
					},
				],
			],
        ],
    ]); ?>
</div>
