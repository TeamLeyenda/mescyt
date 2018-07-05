<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sala */

$this->title = Yii::t('app', 'Añadir Sala');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
