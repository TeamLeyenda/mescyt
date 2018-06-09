<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Congresos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congreso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Congreso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ubicacion_id',
            'horario_id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
