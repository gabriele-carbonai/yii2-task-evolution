<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

?>

<div class="task-form"> 
    <?php $form = ActiveForm::begin(
	    	[
		    	'id' => 'task-form',
	    		'action' =>['taskevolution/default/create'], 
	    	]
	    ); ?>


<?= $form->field($model, 'title')->textInput(['class' => 'form-control title-input']); ?>
<?= $form->field($model, 'description')->textarea(['rows' => 6]); ?>
<?= $form->field($model, 'task_type')->hiddenInput(['value' => $task_type])->label(false); ?>
<?= $form->field($model, 'route')->hiddenInput(['value' => Yii::$app->controller->id.'/'.Yii::$app->controller->action->id])->label(false); ?>


<?= $form->field($model, 'deadline')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => Yii::t('task', 'Enter deadline'), 'class' => 'krajee-datepicker form-control input-data', 'id' =>  $task_type],
    'pluginOptions' => [
        'autoclose'=>true,
        
    ]
]) ?>

 
<?= Html::submitButton(Yii::t('app', 'Post'), ['class' =>  'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
</div>

<?php
$script = <<<SCRIPT

$( 'body' ).on('submit', 'form#task-form', function( e ) {
	
	e.preventDefault();
    e.stopImmediatePropagation();
    
    var task_type = $('#taskevolution-task_type').val();
    
    $.ajax( {
      url: $(this).attr('action'),
      type: 'POST',
      data: new FormData( this ),
      processData: false,
      contentType: false,
      success: function(e){
	       if( task_type == 1 ){
		        $.pjax.reload({container: "#pjax_task", async:false});
		        $.pjax.reload({container: "#pjax_nav_active_task", async:false});
	       }else{
		       $.pjax.reload({container: "#pjax_notes", async:false});
		       $.pjax.reload({container: "#pjax_nav_active_notes", async:false});
	       }
      }
    } );
    
    $('textarea').val(''); 
	$('.title-input').val('')
	$('.input-data').val('');
    
    return false;
    
    
  } );


SCRIPT;
$this->registerJs($script);
?>
