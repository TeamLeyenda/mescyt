<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = Yii::t('app', 'Create User Grado Academico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Grado Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-grado-academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
