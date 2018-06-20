<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Conferencia */

$this->title = Yii::t('app', 'Create Conferencia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Conferencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
