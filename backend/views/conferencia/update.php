<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Conferencia */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Conferencia',
]) . ' ' . $model->Fecha_Inicio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Conferencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Fecha_Inicio, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="conferencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
