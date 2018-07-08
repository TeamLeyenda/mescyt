<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Afiliacion */

$this->title = Yii::t('app', 'Guardar como nuevo {modelClass}: ', [
    'modelClass' => 'Afiliacion',
]). ' ' . $model->Afiliacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Afiliacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Afiliacion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar como nuevo');
?>
<div class="afiliacion-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
