<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>Languages</h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>">Dashboard</a></li>
            <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("language/list"); ?>" title="">Languages</a></li>
            
        </ol>
	</div>
</div>
<div class="contentpanel" style="padding-bottom:0px;">
<input type="button" value="Add New Language" class="btn btn-info" style="float:right" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl("language/manage"); ?>'">  
</div>
<div class="contentpanel">
	<div class="panel panel-default">
    	<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hidaction table-hover mb30" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Language Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($Language as $Lang):?>
                        <tr>
                            <td><?php echo $Lang->LanguageID; ?></td>
                            <td><?php echo $Lang->Language; ?></td>
                            <td><?php if($Lang->Status==1): echo "Active"; else: echo "Inactive"; endif; ?></td>
                            <td class="table-action">
                              	<a href="<?php echo Yii::$app->urlManager->createUrl(["language/manage", "LanguageID" => $Lang->LanguageID]); ?>"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(["language/delete", "LanguageID" => $Lang->LanguageID]); ?>" onclick="if(!confirm('Delete It?')){return false;}" class="delete-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                            
                        </tr>
                      <?php endforeach; ?>
        			</tbody>
				</table>
			</div>
		</div>
	</div>
</div>