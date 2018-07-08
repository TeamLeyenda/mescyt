<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Añadir Tipo User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-user-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
