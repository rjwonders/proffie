<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>CMS Pages</h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>">Dashboard</a></li>
            <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("cms/list"); ?>" title="">CMS Pages</a></li>
            
        </ol>
	</div>
</div>
<?php /*?><div class="contentpanel" style="padding-bottom:0px;">
<input type="button" value="Add New CMS Page" class="btn btn-info" style="float:right" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl("cms/manage"); ?>'">  
</div><?php */?>
<div class="contentpanel">
	<div class="panel panel-default">
    	<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hidaction table-hover mb30" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($Cms as $Cmss):?>
                        <tr>
                            <td><?php echo $Cmss->CMSID; ?></td>
                            <td><?php echo $Cmss->PageName; ?></td>
                            <td><?php if($Cmss->Status==1): echo "Active"; else: echo "Inactive"; endif; ?></td>
                            <td class="table-action">
                              	<a href="<?php echo Yii::$app->urlManager->createUrl(["cms/manage", "CMSID" => $Cmss->CMSID]); ?>"><i class="fa fa-pencil"></i></a>
                                <?php /*?><a href="<?php echo Yii::$app->urlManager->createUrl(["cms/delete", "CMSID" => $Cmss->CMSID]); ?>" onclick="if(!confirm('Delete It?')){return false;}" class="delete-row"><i class="fa fa-trash-o"></i></a><?php */?>
                            </td>
                            
                        </tr>
                      <?php endforeach; ?>
        			</tbody>
				</table>
			</div>
		</div>
	</div>
</div>