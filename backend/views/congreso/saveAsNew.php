<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = Yii::t('app', 'Guardar como nuevo {modelClass}: ', [
    'modelClass' => 'Congreso',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Congresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar como nuevo');
?>
<div class="congreso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
