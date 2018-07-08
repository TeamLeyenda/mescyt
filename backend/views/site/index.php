<?php
use yii\helpers\Html;
use kartik\social\GoogleAnalytics;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">
    
    <div class="congreso-index">
    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        //'filterModel'=>$searchModel,
        'showPageSummary'=>true,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Congresos actuales y futuros'],
        'columns'=>[
            ['class'=>'kartik\grid\SerialColumn'],
            [
                'attribute'=>'provincia_id', 
                'width'=>'310px',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->congreso->provincia->Provincia;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(\backend\models\Provincia::find()->orderBy('Provincia')->asArray()->all(), 'id', 'Provincia'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any provincia'],
                'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            /*
            [
                'attribute'=>'congreso_id', 
                'label' => Yii::t('app', 'Congreso'),
                'width'=>'250px',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->congreso->Nombre;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(\backend\models\Congreso::find()->orderBy('Nombre')->asArray()->all(), 'id', 'Nombre'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any congreso'],
                'group'=>true,  // enable grouping
                'subGroupOf'=>1 // supplier column index is the parent group
            ],
            */

            [
                'attribute'=>'congreso_id', 
                'label' => Yii::t('app', 'Congreso'),
                'width'=>'250px',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->congreso->Nombre;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(\backend\models\Congreso::find()->orderBy('Nombre')->asArray()->all(), 'id', 'Nombre'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any congreso'],
                'group'=>true,  // enable grouping
                'subGroupOf'=>1, // supplier column index is the parent group,
                'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                    return [
                        'mergeColumns'=>[[4]], // columns to merge in summary
                        'content'=>[              // content to show in each summary cell
                            2=>'Total en ' . $model->congreso->Nombre . '',
                            //4=>GridView::F_AVG,
                            //5=>GridView::F_SUM,
                            //6=>GridView::F_SUM,
                            6=>'520',
                        ],
                        'contentFormats'=>[      // content reformatting for each summary cell
                           // 4=>['format'=>'number', 'decimals'=>2],
                           // 5=>['format'=>'number', 'decimals'=>0],
                            6=>['format'=>'number', 'decimals'=>2],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                           // 4=>['style'=>'text-align:right'],
                           // 5=>['style'=>'text-align:right'],
                            6=>['style'=>'text-align:right'],
                        ],
                        // html attributes for group summary row
                        'options'=>['class'=>'success','style'=>'font-weight:bold;']
                    ];
                },
            ],

            [
                'attribute'=>'Titulo',
                'label' => Yii::t('app', 'Presentacion'),
            ],

            [
                'attribute'=>'Fecha_Inicio',
                'label' => Yii::t('app', 'Inicia'),
            ],

            [
                'attribute'=>'Fecha_Final',
                'label' => Yii::t('app', 'Acaba'),
                'pageSummary'=>'Cantidad Total',
                'pageSummaryOptions'=>['class'=>'text-right text-warning'],
            ],

            [
                'class'=>'kartik\grid\FormulaColumn',
                'header'=>'Participantes',
                /*
                'value'=>function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return $widget->col(4, $p) * $widget->col(5, $p);
                },*/
                'mergeHeader'=>true,
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 2],
                'pageSummary'=>true
            ],

            /*
            [
                'attribute'=>'presentacion_id',
                //'label' => Yii::t('app', 'Presentacion'),
                'value' => function($model){
                    return $model->presentacion->Titulo;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' =>ArrayHelper::map(\backend\models\Presentacion::find()->asArray()->all(), 'id', 'Titulo'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presentacion', 'id' => 'grid-congreso-search-provincia_id'],
                'pageSummary'=>'Page Summary',
                'pageSummaryOptions'=>['class'=>'text-right text-warning'],
            ],
            */
                
            ],
            /*
            [
                'attribute'=>'unit_price',
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 2],
                'pageSummary'=>true,
                'pageSummaryFunc'=>GridView::F_AVG
            ],
            [
                'attribute'=>'units_in_stock',
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 0],
                'pageSummary'=>true
            ],
            [
                'class'=>'kartik\grid\FormulaColumn',
                'header'=>'Amount In Stock',
                'value'=>function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return $widget->col(4, $p) * $widget->col(5, $p);
                },
                'mergeHeader'=>true,
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 2],
                'pageSummary'=>true
            ],
            
        ],
        */
    ]);
    
    ?>



    </div>
</div>
