<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecializacion */

$this->title = Yii::t('app', 'Añadir Area Especializacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-especializacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
