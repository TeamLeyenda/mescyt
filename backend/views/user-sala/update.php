<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSala */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Sala',
]) . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'sala_id' => $model->sala_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-sala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
