<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

$this->title = Yii::t('app', 'Create User Area Especializacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-area-especializacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
