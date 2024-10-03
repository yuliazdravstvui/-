<?php

use app\models\Parcing;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parcings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcing-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'car_id',
            'date',
            'price',
            'sale',
            //'debt',

        ],
    ]); ?>


</div>
