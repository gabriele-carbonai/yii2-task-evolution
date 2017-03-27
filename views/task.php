<?php
	
	use gomonkey\taskevolution\models\TaskEvolution;
	use yii\widgets\Pjax;
	use yii\data\ActiveDataProvider;
	use yii\helpers\Html;
	
	rmrevin\yii\fontawesome\AssetBundle::register($this);
	
?>

<div id="task" class="task-panel-views">
	
	
	
</div>

<div id="task" class="task-panel">
	<a href="#" id="task-close" class="btn btn-default pull-right">Close</a>
	<div id="dashboard" class="task-wrapper task-open">
		<h3><?= \Yii::t('task', 'Dashboard') ?></h3>
		<div>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#dashboard_active" aria-controls="home" role="tab" data-toggle="tab"><?= Yii::t('task', 'Active') ?></a></li>
				<li role="presentation"><a href="#dashboard_completed" aria-controls="profile" role="tab" data-toggle="tab"><?= Yii::t('task', 'Completed') ?></a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="dashboard_active">
					
				<?php
					$model = TaskEvolution::find()->where('completed = 0')->all();
					if( !$model ){
						echo '<p>' . Yii::t('task', 'There are not tasks') . '</p>';
					}else{
						foreach( $model as $row ){
							
						}
					}
				?>
					
				</div>
				<div role="tabpanel" class="tab-pane" id="dashboard_completed">
				<?php
					$model = TaskEvolution::find()->where('completed = 1')->all();
					if( !$model ){
						echo '<p>' . Yii::t('task', 'There are not taskskokoko') . '</p>';
					}else{
						foreach( $model as $row ){
							
						}
					}
				?>
				</div>
			</div>
		</div>
		
	
	</div>
	
	<?php
		 
		$array = [1 => 'task', 'notes'];
		foreach( $array as $k => $v ):
		
		
		$dataProviderActive = new ActiveDataProvider([
			            'query' =>  TaskEvolution::find()->where('completed = 0 AND task_type = :task_type', [':task_type' => $k])->orderBy('order DESC, id DESC'),
			           
			        ]);
			
		$dataProviderCompleted = new ActiveDataProvider([
			            'query' =>  TaskEvolution::find()->where('completed = 1 AND task_type = :task_type', [':task_type' => $k])->orderBy('order DESC, id DESC'),
			           
			        ]);
	?>
	<div id="<?=$v?>" class="task-wrapper">
		<h3><?= \Yii::t('task', $v) ?></h3>
		
		<div>
			
			<ul class="nav nav-tabs" role="tablist">
				
				<li role="presentation" class="active">
					<a href="#<?=$v?>_active" aria-controls="home" role="tab" data-toggle="tab">
						<?php Pjax::begin(['id' => 'pjax_nav_active_'.$v]);?><?= Yii::t('task', 'Active') . ' <span class="label label-danger">' . $dataProviderActive->getTotalCount() .'</span>'?>	<?php Pjax::end(); ?>
					</a>
				</li>
				<li role="presentation">
					<a href="#<?=$v?>_completed" aria-controls="profile" role="tab" data-toggle="tab">
						<?php Pjax::begin(['id' => 'pjax_nav_completed_'.$v]);?><?= Yii::t('task', 'Completed') . ' <span class="label label-success">' . $dataProviderCompleted->getTotalCount() .'</span>' ?><?php Pjax::end(); ?>
					</a>
				</li>
				
				<li role="presentation"><a href="#add_<?=$v?>" aria-controls="profile" role="tab" data-toggle="tab"><?= Yii::t('task', 'Add ' . $v) ?></a></li>
			</ul>
		 
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="<?=$v?>_active">
					
				<?php
					
					 Pjax::begin(['id' => 'pjax_'.$v]);
					echo $this->render('_gridview', [ 'dataProvider' => $dataProviderActive]);
					Pjax::end();
						
					 
				?>
				</div>
				<div role="tabpanel" class="tab-pane" id="<?=$v?>_completed">
				<?php
					
					
					Pjax::begin(['id' => 'pjax_completed_'.$v]);
					echo $this->render('_gridview', [ 'dataProvider' => $dataProviderCompleted]);
					Pjax::end();

				?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="add_<?=$v?>">
						<?php
							 $model = new TaskEvolution();
							 echo $this->renderAjax('_form', [
							        'model' => $model,
							        'task_type' => 1
							    ]);
						?>
				</div>
			</div>
		</div>
		
	</div>
	<?php endforeach;
			 
		 ?>
	
</div>

<div id="wrapper" class="toggled-2 task-menu">       
	<div id="sidebar-wrapper">
    	<ul class="sidebar-nav nav-pills nav-stacked task-evolution" id="menu">
			<li class="active">
	        	<a href="#" id="dashboard"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> <?= \Yii::t('task', 'Dashboard') ?></a></li>
			
	        <li>
	        	<a href="#" id="task"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> <?= \Yii::t('task', 'Tasks') ?></a>
	        </li>
	        <li>
	            <a href="#" id="notes"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span><?= \Yii::t('task', 'Notes') ?></a>
	        </li>
		</ul>
	</div>
</div>

<?php
$baseUrl = Yii::$app->request->baseUrl;
$script = <<<SCRIPT


function DeleteRow(cellButton) {
    var row = $(cellButton).closest('tr')
        .children('td')
    	.css({ backgroundColor: "red", color: "white" });
    setTimeout(function () {
            $(row)
            .animate({ paddingTop: 0, paddingBottom: 0 }, 100)
            .wrapInner('<div />')
            .children()
            .slideUp(150, function() { $(this).closest('tr').remove(); });
    	}, 15
    );
};


 $( document ).on('change', '[type=checkbox]', function( e ) {
   
    DeleteRow(this);
    
    if(this.checked) {
	   
       $.post("{$baseUrl}/taskevolution/default/changestatus", {id: $(this).closest('tr').attr('data-key')}, function(result){
           
           setTimeout(function () {
           $.pjax.reload({container: "#pjax_task", async:false});
           $.pjax.reload({container: "#pjax_completed_task", async:false});
           $.pjax.reload({container: "#pjax_notes", async:false});
           $.pjax.reload({container: "#pjax_completed_notes", async:false});
           
           
           $.pjax.reload({container: "#pjax_nav_active_task", async:false});
           $.pjax.reload({container: "#pjax_nav_completed_task", async:false});
           
           $.pjax.reload({container: "#pjax_nav_active_notes", async:false});
           $.pjax.reload({container: "#pjax_nav_completed_notes", async:false});
           
           }, 100
    );
       });
    }
});


$('#pjax').on('pjax:error', function (event) {
    alert('Failed to load the page');
    event.preventDefault();
});
SCRIPT;
$this->registerJs($script);
?>
