<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecializacion */

$this->title = Yii::t('app', 'Guardar nuevo {modelClass}: ', [
    'modelClass' => 'Area de especializacion',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas de especializaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar nuevo');
?>
<div class="area-especializacion-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
