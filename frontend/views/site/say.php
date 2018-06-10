<?php
use yii\helpers\Html;
use meysampg\formbuilder\FormBuilder;
?>
<?= Html::encode($message) ?>
<?= FormBuilder::widget([
    'dataType' => 'json',
    'language' => 'en',
]); ?>