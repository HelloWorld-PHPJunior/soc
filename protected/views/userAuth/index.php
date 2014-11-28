<?php

$this->breadcrumbs=array(
	'Авторизация Пользователя',
);

$this->menu=array(
	array('label'=>'Create UserAuth', 'url'=>array('create')),
	array('label'=>'Manage UserAuth', 'url'=>array('admin')),
);
?>

<h1>Авторизация Пользователя</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
