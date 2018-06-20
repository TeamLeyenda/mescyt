<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Grado_academico */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Grado Academico',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grado Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="grado-academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>