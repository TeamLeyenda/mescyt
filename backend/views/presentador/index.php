<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presentadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presentador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'afiliacion_id',
            'Nombre',
            'Apellido',
            'Telefono',
            //'Correo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
