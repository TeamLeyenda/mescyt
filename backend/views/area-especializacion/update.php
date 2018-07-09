<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecializacion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Area de especializacion',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas de especializaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="area-especializacion-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
