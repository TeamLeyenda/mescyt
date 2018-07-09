<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'User Area Especializacion',
]). ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="user-area-especializacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
