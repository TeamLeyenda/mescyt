<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentador */

$this->title = 'Update Presentador: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Presentadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presentador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
