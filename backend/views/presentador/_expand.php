<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Area Especializacion')),
        'content' => $this->render('_dataPresentadorAreaEspecializacion', [
            'model' => $model,
            'row' => $model->presentadorAreaEspecializacions,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Grado Academico')),
        'content' => $this->render('_dataPresentadorGradoAcademico', [
            'model' => $model,
            'row' => $model->presentadorGradoAcademicos,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Presentacion')),
        'content' => $this->render('_dataPresentadorPresentacion', [
            'model' => $model,
            'row' => $model->presentadorPresentacions,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Sala')),
        'content' => $this->render('_dataPresentadorSala', [
            'model' => $model,
            'row' => $model->presentadorSalas,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'User')),
        'content' => $this->render('_dataUser', [
        'model' => $model->user        ]),
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
