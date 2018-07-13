<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Tipo User',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="tipo-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
