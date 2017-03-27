<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Slides */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slides-view">

    <h1><?= Html::encode($this->title) ?></h1>
<a href="#" id="task-view-close" class="btn btn-default pull-right">Close</a>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description',
        ],
    ]) ?>

</div>
