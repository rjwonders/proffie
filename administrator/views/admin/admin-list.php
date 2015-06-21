<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<div class="pageheader">
	<h2><i class="fa fa-home"></i> System Admin/Editor</h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>">Dashboard</a></li>
            <?php if(Yii::$app->session['UserTypeID']==1): ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("admin/list"); ?>" title="">System Admin/Editor</a></li>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("admin/list"); ?>" title="">System Admin/Editor</a></li>
            <?php endif; ?>
        </ol>
	</div>
</div>
<div class="contentpanel" style="padding-bottom:0px;">
<input type="button" value="Add New System Admin/Editor" class="btn btn-info" style="float:right" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl("admin/manage"); ?>'">  
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
                            <th>Email</th>
                            <th>Admin Type</th>
                            <th>Last Login Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for($i=0;$i<count($data);$i++):?>
                        <tr>
                            <td><?php echo $data[$i]['AdminID']; ?></td>
                            <td><?php echo $data[$i]['FirstName']." ".$data[$i]['LastName']; ?></td>
                            <td><?php echo $data[$i]['Email']; ?></td>
                            <td><?php echo $data[$i]['UserType']; ?></td>
                            <td><?php if($data[$i]['LastLogin']!="0000-00-00 00:00:00"): echo date("d M,Y h:i A",strtotime($data[$i]['LastLogin'])); endif; ?></td>
                            <td><?php if($data[$i]['Status']==1): echo "Active"; else: echo "Inactive"; endif; ?></td>
                            <td class="table-action">
                              	<a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage", "AdminID" => $data[$i]['AdminID']]); ?>"><i class="fa fa-pencil"></i></a>
                                <?php if($data[$i]['AdminID']!=Yii::$app->session['AdminID']): ?>
                            	<a href="<?php echo Yii::$app->urlManager->createUrl(["admin/delete", "AdminID" => $data[$i]['AdminID']]); ?>" onclick="if(!confirm('Delete It?')){return false;}" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                            
                        </tr>
                      <?php endfor; ?>
        			</tbody>
				</table>
			</div>
		</div>
	</div>
</div>