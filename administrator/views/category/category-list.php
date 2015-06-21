<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i>Categories</h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>">Dashboard</a></li>
            <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("category/list"); ?>" title="">Categories</a></li>
            
        </ol>
	</div>
</div>
<div class="contentpanel" style="padding-bottom:0px;">
<input type="button" value="Add New Category" class="btn btn-info" style="float:right" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl("category/manage"); ?>'">  
</div>
<div class="contentpanel">
	<div class="panel panel-default">
    	<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hidaction table-hover mb30" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Parent Category Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for($i=0;$i<count($Category);$i++):?>
                        <tr>
                            <td><?php echo $Category[$i]['CategoryID']; ?></td>
                            <td><?php echo $Category[$i]['Category']; ?></td>
                            <td><?php echo $Category[$i]['ParentCategory']; ?></td>
                            <td><?php if($Category[$i]['Status']==1): echo "Active"; else: echo "Inactive"; endif; ?></td>
                            <td class="table-action">
                              	<a href="<?php echo Yii::$app->urlManager->createUrl(["category/manage", "CategoryID" => $Category[$i]['CategoryID']]); ?>"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(["category/delete", "CategoryID" => $Category[$i]['CategoryID']]); ?>" onclick="if(!confirm('Delete It?')){return false;}" class="delete-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                            
                        </tr>
                      <?php endfor; ?>
        			</tbody>
				</table>
			</div>
		</div>
	</div>
</div>