<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Usuario')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentacion User')),
        'content' => $this->render('_dataPresentacionUser', [
            'model' => $model,
            'row' => $model->presentacionUsers,
        ]),
    ],
                        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'User Area Especializacion')),
        'content' => $this->render('_dataUserAreaEspecializacion', [
            'model' => $model,
            'row' => $model->userAreaEspecializacions,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'User Grado Academico')),
        'content' => $this->render('_dataUserGradoAcademico', [
            'model' => $model,
            'row' => $model->userGradoAcademicos,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'User Sala')),
        'content' => $this->render('_dataUserSala', [
            'model' => $model,
            'row' => $model->userSalas,
        ]),
    ],
        ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
