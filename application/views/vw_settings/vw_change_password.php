<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/1/2017
 * Time: 2:15 AM
 */
/*echo '<pre>';
print_r($_SESSION);
exit();*/
?>

    <!-- User Info, Notifications and Menu Bar -->
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Password Change</h1>
            <p class="description">Update your default password for security purpose</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url()?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li class="active">

                    <strong>Password Change</strong>
                </li>
            </ol>

        </div>

    </div>

    <div>

    </div>
<?php $this->load->view($alert_msg); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>

                <div class="panel-body">
                    <form method="post" action="<?php echo base_url()?>settings/password_change" class="validate" onsubmit="return change_password()">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <div class="form-group  " id="clas">
                                            <input type="hidden" id="login_id2" name="login_id2" value="<?php if
                                            ($this->session->has_userdata('login_id')) { echo
                                            $this->session->userdata('login_id'); }
                                                ?>">
                                            <input onkeyup="check_password()" type="password" class="form-control current_p" name="current_pp" id="current_p" data-validate="required" placeholder="Enter current password" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Choose Password</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="new_p" id="new_p" data-validate="required" placeholder="Enter new password" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Repeat Password</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="repeat_p" id="repeat_p" data-validate="required,equalTo[#new_p]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-white">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

    var o_p=0;
    function check_password() {
        var pass=$('#current_p').val();
        var login_id2 = Number($('#login_id2').val());
        $.ajax({
            type:'POST',
            data:{pass:pass,id:login_id2},
            url:"<?php echo site_url('settings/check_pass')?>",
            async: false,
            success:function (result) {
                if(result==login_id2)
                {
                    document.getElementById("clas").className = "form-group has-success";
                    o_p=1
                }
                else
                {

                    document.getElementById("clas").className = "form-group has-error";
                    o_p=-1
                }
            },
            error:function (result) {
                alert(result);
            }
        })
    }
    function change_password() {
        var npass=$('#new_p').val();
        var rpass=$('#repeat_p').val();

        if(o_p==-1)
        {
            alert("Current password won't match");
            return false;
        }else if(npass != rpass){
            alert("Choose Password and Repeat Password Not Matched");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>
