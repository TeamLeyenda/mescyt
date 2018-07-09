<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-area-especializacion-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'User Area Especializacion').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id], [
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
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'User'),
        ],
        [
            'attribute' => 'areaEspecializacion.area',
            'label' => Yii::t('app', 'Area Especializacion'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>AreaEspecializacion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnAreaEspecializacion = [
        ['attribute' => 'id', 'visible' => false],
        'area',
    ];
    echo DetailView::widget([
        'model' => $model->areaEspecializacion,
        'attributes' => $gridColumnAreaEspecializacion    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        'afiliacion_id',
        'tipo_user_id',
        'username',
        'email',
        'Telefono',
        'image',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
