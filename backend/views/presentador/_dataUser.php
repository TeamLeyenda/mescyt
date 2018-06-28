<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model User */

?>
<?php if(!is_null($model)): ?>
<div>

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
    <?php 
        $gridColumn = [
            ['attribute' => 'id', 'visible' => false],
            'participante_id',
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
</div>
<?php else: ?>
<div class="user-view">
    <div class="row">
        <div class="col-sm-9">
            <h2>User</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">User not set.</div>
    </div>
</div>
<?php endif; ?>
