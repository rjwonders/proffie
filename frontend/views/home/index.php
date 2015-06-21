<?php
/* @var $this yii\web\View */
$this->title = 'Welcome to Proffie';

use frontend\components\BannerWidget;
use frontend\components\TopCategoryWidget;
use frontend\components\WhyProffieWidget;
use frontend\components\HowWorksWidget;
use frontend\components\WhatProffieWidget;
use frontend\components\RecentProjectWidget;
use frontend\components\LocalWorkerWidget;
use frontend\components\FaqWidget;
use frontend\components\AppWidget;
?>
<?php echo BannerWidget::widget(); ?>
<?php echo TopCategoryWidget::widget(); ?>
<?php echo WhyProffieWidget::widget(); ?>
<?php echo HowWorksWidget::widget(); ?>
<?php echo WhatProffieWidget::widget(); ?>
<?php echo RecentProjectWidget::widget(); ?>
<?php echo LocalWorkerWidget::widget(); ?>
<?php echo FaqWidget::widget(); ?>
<?php echo AppWidget::widget(); ?>