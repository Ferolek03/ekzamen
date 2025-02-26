<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
$items = Category::find()
    ->select(['name'])
    ->indexBy('id')
    ->column();
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=>Yii::$app->user->identity->getId()])->label(false) ?>

    <?= $form->field($model, 'id_category')->dropDownList($items) ?>

    <?= $form->field($model, 'gos_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
