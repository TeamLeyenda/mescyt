<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = 'Create Congreso';
$this->params['breadcrumbs'][] = ['label' => 'Congresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congreso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
