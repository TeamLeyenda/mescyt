<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GradoAcademico */

$this->title = Yii::t('app', 'Añadir Grado Academico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grados Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-academico-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
