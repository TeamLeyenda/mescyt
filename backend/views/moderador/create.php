<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Moderador */

$this->title = Yii::t('app', 'Create Moderador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moderadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moderador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
