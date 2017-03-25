<?php
	rmrevin\yii\fontawesome\AssetBundle::register($this);
?>

<div id="task" class="task-panel">
	<a href="#" id="task-close" class="btn btn-default pull-right">Close</a>
	<div id="dashboard" class="task-wrapper task-open">
		<h3><?= \Yii::t('task', 'Dashboard') ?></h3>
	</div>
	
	<div id="tasks" class="task-wrapper">
		<h3><?= \Yii::t('task', 'Tasks') ?></h3>
	</div>
	
	<div id="notes" class="task-wrapper">
		<h3><?= \Yii::t('task', 'Notes') ?></h3>
	</div>
	
	<div id="ideas" class="task-wrapper">
		<h3><?= \Yii::t('task', 'Ideas') ?></h3>
	</div>
</div>

<div id="wrapper" class="toggled-2 task-menu">       
	<div id="sidebar-wrapper">
    	<ul class="sidebar-nav nav-pills nav-stacked task-evolution" id="menu">
			<li class="active">
	        	<a href="#" id="dashboard"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> <?= \Yii::t('task', 'Dashboard') ?></a></li>
	        <li>
	        	<a href="#" id="tasks"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> <?= \Yii::t('task', 'Tasks') ?></a>
	        </li>
	        <li>
	            <a href="#" id="notes"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span><?= \Yii::t('task', 'Notes') ?></a>
	        </li>
	        <li>
	            <a href="#" id="ideas"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span> <?= \Yii::t('task', 'Ideas') ?></a>
	        </li>
		</ul>
	</div>
</div>