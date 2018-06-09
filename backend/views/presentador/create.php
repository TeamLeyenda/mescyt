<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Presentador */

$this->title = 'Create Presentador';
$this->params['breadcrumbs'][] = ['label' => 'Presentadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
