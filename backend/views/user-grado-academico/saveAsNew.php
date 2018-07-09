<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = Yii::t('app', 'Guardar nuevo {modelClass}: ', [
    'modelClass' => 'User Grado Academico',
]). ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Grado academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar nuevo');
?>
<div class="user-grado-academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
