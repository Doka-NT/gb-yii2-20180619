<?php

use app\models\Product;
use yii\widgets\ActiveForm;

/* @var $model Product */

?>
<h1>Hello</h1>

<div>

</div>

<?php $form = ActiveForm::begin([
//		'method' => 'get',
 		'options' => [
				'data-foo' => 777,
			'class' => 'my-form'
		]
]);?>
	<?php echo $form->errorSummary($model);?>

	<?=$form
		->field($model, 'name')
		->dropDownList(['foo', 'bar', 'baz', 'qux'], [
				'data-ui' => 'help'
		])
		->hint('some help text')
	;?>

	<?=$form->field($model, 'count')->label('Set some couut');?>

	<?=\yii\bootstrap\Html::submitButton('submit');?>
<?php ActiveForm::end();?>
