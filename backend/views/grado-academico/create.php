<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GradoAcademico */

$this->title = Yii::t('app', 'Añadir Grado Academico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grado Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
