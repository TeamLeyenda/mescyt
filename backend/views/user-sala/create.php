<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserSala */

$this->title = Yii::t('app', 'Create User Sala');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-sala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
