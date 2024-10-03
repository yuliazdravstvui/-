<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parcing $model */

$this->title = 'Update Parcing: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parcings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parcing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
