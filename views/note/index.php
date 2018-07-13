<?php

use app\models\Access;
use app\objects\CheckNoteAccess;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
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
            [
                'attribute' => 'text',
                'format' => 'raw',
                'value' => function ($model) {
                    $text = StringHelper::truncateWords($model->text, 2, '', true);

                    return Html::a($text, ['note/view', 'id' => $model->id]);
                }
            ],
			'author.name',
            [
                'attribute' => 'date_create',
                'format' => ['date', 'php:d.m.Y H:i'],
            ],
			[
				'class' => ActionColumn::class,
                'visibleButtons' => [
                    'update' => function ($model) {
                        return (new CheckNoteAccess)->execute($model) === Access::LEVEL_EDIT;
                    }
                ],
			],
        ],
    ]); ?>
</div>
