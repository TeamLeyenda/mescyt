<div class="form-group" id="add-user">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'User',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'afiliacion_id' => [
            'label' => 'Afiliacion',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('Afiliacion')->asArray()->all(), 'id', 'Afiliacion'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Afiliacion')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'username' => ['type' => TabularForm::INPUT_TEXT],
        "auth_key" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'password_hash' => ['type' => TabularForm::INPUT_TEXT],
        "password_reset_token" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        "status" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        "created_at" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        "updated_at" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'image' => ['type' => TabularForm::INPUT_TEXT],
        'Nombre' => ['type' => TabularForm::INPUT_TEXT],
        'Apellido' => ['type' => TabularForm::INPUT_TEXT],
        'Telefono' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowUser(' . $key . '); return false;', 'id' => 'user-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add User'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUser()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

