
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use meysampg\formbuilder\FormBuilder;

?>

<div>
<?= FormBuilder::widget([
    'data' => [
        [
            "type" => "header",
            "subtype" => "h1",
            "label" => "Header",
            "class" => "header",
        ],
        [
            "type" => "button",
            "label" => "Button",
            "subtype" => "button",
            "class" => "button-input btn btn-warning",
            "name" => "button-1475845417456",
            "style" => "warning",
        ],
    ],
])?>
</div>