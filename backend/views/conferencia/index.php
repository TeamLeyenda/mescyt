<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conferencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Conferencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'congreso_id',
            'horario_id',
            'Titulo',
            'Institucion',
            //'Area_Tematica',
            //'Modalidad_Presentacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
