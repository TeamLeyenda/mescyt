<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'User').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'participante.id',
            'label' => Yii::t('app', 'Participante'),
        ],
        'username',
        'password_hash',
        'email:email',
        'image',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Moderador<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnModerador = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        'Telefono',
    ];
    echo DetailView::widget([
        'model' => $model->moderador,
        'attributes' => $gridColumnModerador    ]);
    ?>
    <div class="row">
        <h4>Participante<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnParticipante = [
        ['attribute' => 'id', 'visible' => false],
        'afiliacion_id',
        'Nombre',
        'Apellido',
        'Telefono',
    ];
    echo DetailView::widget([
        'model' => $model->participante,
        'attributes' => $gridColumnParticipante    ]);
    ?>
    <div class="row">
        <h4>Presentador<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPresentador = [
        ['attribute' => 'id', 'visible' => false],
        'afiliacion_id',
        'Nombre',
        'Apellido',
        'Telefono',
        'Descripcion',
    ];
    echo DetailView::widget([
        'model' => $model->presentador,
        'attributes' => $gridColumnPresentador    ]);
    ?>
</div>
