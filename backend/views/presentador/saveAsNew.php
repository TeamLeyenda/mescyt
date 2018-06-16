<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Presentador */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Presentador',
]). ' ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="presentador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
