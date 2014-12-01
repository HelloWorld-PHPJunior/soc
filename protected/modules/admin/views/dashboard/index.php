<?php
$this->pageTitle=Yii::app()->name;
?>


<p>In order to write me please go to <a href="http://www.daniel22.198586@gmail.com/">post office</a>.
    Feel free to ask in the question <a href="http://www.google.ru/">google</a>,
    should you have any questions.</p>


<?php
echo 'Trial Operation';
class RouteController extends Controller
{

    public function actionRoute()
    {
        $this->render('route');
    }
}

/*<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>*/
?>