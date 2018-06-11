<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Afiliacion */

$this->title = 'Create Afiliacion';
$this->params['breadcrumbs'][] = ['label' => 'Afiliacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>