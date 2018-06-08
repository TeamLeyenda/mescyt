<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Conferencia */

$this->title = 'Create Conferencia';
$this->params['breadcrumbs'][] = ['label' => 'Conferencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
