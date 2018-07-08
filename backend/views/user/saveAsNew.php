<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = Yii::t('app', 'Guardar nuevo {modelClass}: ', [
    'modelClass' => 'User',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar nuevo');
?>
<div class="user-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
