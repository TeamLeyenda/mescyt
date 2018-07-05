<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pais */

$this->title = Yii::t('app', 'Guardar como nuevo {modelClass}: ', [
    'modelClass' => 'Pais',
]). ' ' . $model->Pais;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Pais, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Guardar como nuevo');
?>
<div class="pais-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
