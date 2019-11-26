<?php

use coderius\goodshare\widgets\Share;
use yii\web\JsExpression;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model tests\models\Post */
?>

<?php $widget = Share::begin([
    'options' => []
]); 
?>

<?= $widget->item('message', $options = []); ?>
<?= $widget->item('message', $options = []); ?>
<?= $widget->item('message', $options = []); ?>

<?php GoodShare::end(); ?>