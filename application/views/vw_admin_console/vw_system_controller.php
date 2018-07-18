<div class="page-title">
	<div class="title-env">
		<h1 class="title">Controller List</h1>
		<p class="description">Controller Management</p>
	</div>

	<div class="breadcrumb-env">

		<ol class="breadcrumb bc-1" >
			<li>
			<a href="dashboard-1.html"><i class="fa-cog"></i>Admin Console</a>
			</li>
			<li class="active">
			<a href="extra-gallery.html">Controller</a>
			</li>
		</ol>			
	</div>	
</div>
<?php $this->load->view($alert_msg); ?>
<!-- Basic Setup -->
<div class="panel panel-default">
	<div class="panel-heading">
		
		<div class="panel-options">
			<a href="#" data-toggle="panel">
				<span class="collapse-icon">&ndash;</span>
				<span class="expand-icon">+</span>
			</a>
			<a href="#" data-toggle="remove">
				&times;
			</a>
		</div>
		<div class="action_panel">
			<a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left"  onclick="jQuery('#add_group_modal').modal('show', {backdrop: 'fade'});"><i class="fa fa-plus-circle"></i> Add New Controller</a>
		</div>
		
	</div>
	<div class="panel-body">		
		<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Controller</th>
					<th>Action</th>
				</tr>
			</thead>		
			<tbody>
				<?php foreach($controller_list as $controller): ?>
				<tr>
					<td><?php echo $controller->controller_name; ?> </td>
					<td><a href="#" onclick="jQuery('#edit_group_modal_<?php echo $controller->ser_id; ?>').modal('show');" class="btn btn-secondary btn-sm btn-icon icon-left">Edit</a>
					<a href="<?php echo base_url().'auth/delete_controller/'.$controller->ser_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" title="Delete" onclick="return Controller_delete()">Delete</a>
                        <a href="<?php echo base_url().'auth/config_controller_function/'.$controller->ser_id; ?>" class="btn btn-warning btn-sm btn-icon icon-left" title="Config Functions">Functions</a></td>
				</tr>

                <div class="modal fade" id="edit_group_modal_<?php echo $controller->ser_id; ?>">
					<div class="modal-dialog">
                        <div class="modal-content">
				
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Update Controller</h4>
                            </div>
                            
                            <form action="<?php echo base_url('auth/update_controller/'.$controller->ser_id); ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Controller</label>
                                    <input type="text" name="controller_name" id="controller_name" class="form-control" value="<?php echo $controller->controller_name; ?>" placeholder="Ex: home" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="controller_desc" id="controller_desc" value="<?php if($controller->controller_desc) echo $controller->controller_desc; ?>" class="form-control" placeholder="Ex: abc">
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-info" name="submit" id="submit" value="Update Controller">
                            </div>
                            </form>
                        </div>
					</div>
				</div>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="modal fade" id="add_group_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add New Controller</h4>
				</div>
				
				<form action="<?php echo base_url('auth/save_controller'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Controller</label>
						<input type="text" name="controller_name" id="controller_name" class="form-control" placeholder="Ex: home" required="true">
					</div>
					<div class="form-group">
						<label for="">Description</label>
						<input type="text" name="controller_desc" id="controller_desc" class="form-control" placeholder="Ex: abc">
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-info" name="submit" id="submit" value="Save Controller">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function($) {
	$("#example-1").dataTable({
		aLengthController: [
			[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
		]
	});
});

function Controller_delete() {
	var check = confirm('Are You Sure To Delete Controller!!!');
    if (check) {
        return true;
    }
    else {
        return false;
    }
}
</script>