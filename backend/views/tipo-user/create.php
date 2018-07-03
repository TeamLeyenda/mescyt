<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Create Tipo User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>