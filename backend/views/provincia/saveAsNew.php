<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Provincia */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Provincia',
]). ' ' . $model->Provincia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Provincia, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="provincia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
