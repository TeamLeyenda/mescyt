<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Moderador */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moderadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moderador-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Moderador').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        'Telefono',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerSala->totalCount){
    $gridColumnSala = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'Nombre_Sala',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSala,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Sala')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnSala
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUser->totalCount){
    $gridColumnUser = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'participante.id',
                'label' => Yii::t('app', 'Participante')
            ],
        'username',
        'password_hash',
        'email:email',
        'image',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'User')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUser
    ]);
}
?>
    </div>
</div>
