<?php
/* @var $this UserAuthController */
/* @var $model UserAuth */

$this->breadcrumbs=array(
	'User Auths'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserAuth', 'url'=>array('index')),
	array('label'=>'Create UserAuth', 'url'=>array('create')),
	array('label'=>'Update UserAuth', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserAuth', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserAuth', 'url'=>array('admin')),
);
?>

<h1>View UserAuth #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'login',
		'pass',
		'provider',
	),
)); ?>
