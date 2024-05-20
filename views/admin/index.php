<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'Категория',
                'value'=>function($data){
                    return $data->category->name;
                }
            ],
            'gos_number',
            'descriptions:ntext',
            'descriptions_denied:ntext',
            [
                'attribute'=>'Статус',
                'format'=>'html',
                'value'=>function($data){
                    if ($data->status == 0){ return ' ' .Html::a('Принять', "/ekzamen/web/request/success?id=$data->id") . ' ' .Html::a('Отказать', "/ekzamen/web/request/cancel?id=$data->id");};
                    if ($data->status == 1) return 'Принято';
                    if ($data->status == 2) return 'Отказано';
                }
            ],
        ],
    ]); ?>


</div>
