<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>Currency</h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>">Dashboard</a></li>
            <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("currency/list"); ?>" title="">Currency</a></li>
            
        </ol>
	</div>
</div>
<div class="contentpanel" style="padding-bottom:0px;">
<input type="button" value="Add New Currency" class="btn btn-info" style="float:right" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl("currency/manage"); ?>'">  
</div>
<div class="contentpanel">
	<div class="panel panel-default">
    	<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hidaction table-hover mb30" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Prefix</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($Currency as $Curren):?>
                        <tr>
                            <td><?php echo $Curren->CurrencyID; ?></td>
                            <td><?php echo $Curren->Currency; ?></td>
                            <td><?php echo $Curren->CurrencyPrefix; ?></td>
                            <td><?php if($Curren->Status==1): echo "Active"; else: echo "Inactive"; endif; ?></td>
                            <td class="table-action">
                              	<a href="<?php echo Yii::$app->urlManager->createUrl(["currency/manage", "CurrencyID" => $Curren->CurrencyID]); ?>"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(["currency/delete", "CurrencyID" => $Curren->CurrencyID]); ?>" onclick="if(!confirm('Delete It?')){return false;}" class="delete-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                            
                        </tr>
                      <?php endforeach; ?>
        			</tbody>
				</table>
			</div>
		</div>
	</div>
</div>