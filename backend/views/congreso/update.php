<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = 'Update Congreso: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Congresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="congreso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
