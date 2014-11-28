<?php
/* @var $this UserAuthController */
/* @var $model UserAuth */

$this->breadcrumbs=array(
	'User Auths'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserAuth', 'url'=>array('index')),
	array('label'=>'Manage UserAuth', 'url'=>array('admin')),
);
?>

<h1>Create UserAuth</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>