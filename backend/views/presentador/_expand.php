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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Catalogo')),
        'content' => $this->render('_dataCatalogo', [
            'model' => $model,
            'row' => $model->catalogos,
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Conferencia')),
        'content' => $this->render('_dataPresentadorConferencia', [
            'model' => $model,
            'row' => $model->presentadorConferencias,
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentador Sala')),
        'content' => $this->render('_dataPresentadorSala', [
            'model' => $model,
            'row' => $model->presentadorSalas,
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
