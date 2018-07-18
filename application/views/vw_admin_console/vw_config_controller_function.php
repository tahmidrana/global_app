<?php
//echo '<pre>';
//print_r($class_methods);
?>
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
        <h4><strong>Controller: </strong><?php echo $controller_data->controller_name; ?></h4>
        <!--<div class="action_panel">
            <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left"  onclick="jQuery('#add_group_modal').modal('show', {backdrop: 'fade'});"><i class="fa fa-save"></i> Save</a>
        </div>-->

    </div>

    <?php //print_r($class_methods); ?>

    <div class="panel-body">
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th></th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($class_methods as $method): ?>
            <tr>
                <td style="width: 20px;"></td>
                <td><?= $method['function_name'] ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p class="form-group">
            <button type="submit" class="btn btn-primary" onclick="return approve_incentive_chunk()">Save</button>
        </p>
    </div>
</div>
<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function($) {
        table = $("#example-1").DataTable({
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
            'order': [[1, 'asc']],
            'paging': false
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