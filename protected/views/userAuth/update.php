<?php
/* @var $this UserAuthController */
/* @var $model UserAuth */

$this->breadcrumbs=array(
	'User Auths'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserAuth', 'url'=>array('index')),
	array('label'=>'Create UserAuth', 'url'=>array('create')),
	array('label'=>'View UserAuth', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserAuth', 'url'=>array('admin')),
);
?>

<h1>Update UserAuth <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>