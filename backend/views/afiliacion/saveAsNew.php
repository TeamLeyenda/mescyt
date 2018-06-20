<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Afiliacion */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Afiliacion',
]). ' ' . $model->Afiliacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Afiliacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Afiliacion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="afiliacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
