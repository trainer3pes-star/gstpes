
<div class="container py-5">
   <div class="content-wrapper">
        <div class="dimmer-holder" style="display: none;">
            <div id="dimmer"></div>
        </div>
        <div class="container" style="font-size:14px;">
            
<div class="mypage">
    <div class="row">
        <div class="col-xs-10">
            <div name="Dashboard">
                <ol class="breadcrumb">
                    <li><a target="" href="">Admin</a></li>
                    <li>
                        <!--<ng-switch on="$last">-->
                            <span><a href="" target="_self">User List Report</a></span>
                        <!--</ng-switch>-->
                    </li>
                    
                </ol>
            </div>
        </div>
       
    </div>

    <div>
        <div class="container" >
            
            
            <div class="row invsumm">
                <div class="col-xs-12 col-sm-12 taxp">
                    <h4>User List Report</h4>
                </div>
                
            </div>
            <div class="tabpane">
              
                <div class="row">
                                        <div class="col-sm-6">
<button id="approveBtn" class="btn btn-success mb-2">Approve</button>
<button id="unapproveBtn" class="btn btn-success mb-2">Unapprove</button>

</div>
                    <div class="col-sm-12">
                        <div class="table-responsive text-center">
                         <div class="d-flex justify-content-center mt-3">
    <?php echo $pagination; ?>
</div>
                            <table id="example_php" class="table table-bordered table-striped  col-xs-12" >
								<thead>
									<tr>
									<th><input type="checkbox" id="select_all"></th>    
   									<th class="text-center">Name</th>										 
   									<th class="text-center">Email</th>										 
   									<th class="text-center">Contact</th>		
									<th class="text-center">Action</th>
								    <th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach(@$results as $result){?>
									<tr>
							            <td>
    <input type="checkbox" class="user_checkbox" value="<?php echo $result->id; ?>">
</td>
									    <td><?php echo $result->name; ?></td>
										<td><?php echo $result->email; ?></td> 
										<td><?php echo $result->contact; ?></td>
                                        <td><a href="view_user_access_details/<?php echo $result->id?>">View Access Details</a>
                                         |
                <?php if ($result->is_active == 1) { ?>
                    <a href="javascript:void(0);" onclick="toggleUserStatus(<?php echo $result->id ?>, 0)">Deactivate</a>
                <?php } else { ?>
                    <a href="javascript:void(0);" onclick="toggleUserStatus(<?php echo $result->id ?>, 1)">Activate</a>
                <?php } ?>
                                         |
                <a href="javascript:void(0);" onclick="resetPassword(<?php echo $result->id ?>, '<?php echo addslashes($result->name); ?>')">Reset Password</a>
                                        </td>
                                        <td>
    <?php 
        if ($result->status == 0) {
            echo "Pending";
        } else  if ($result->status == 1) {
            echo "Approved";
        }else   if ($result->status == 2) {
            echo "Unapprove";
        }
    ?>
</td>
									
									</tr>
									<?php }?>
								</tbody>
								 
							</table>
                          <div class="d-flex justify-content-center mt-3">
    <?php echo $pagination; ?>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<script>
function resetPassword(userId, name) {
    if (!confirm("Reset password for " + name + "? A new password will be generated -- copy it and tell them directly.")) {
        return;
    }
    $.ajax({
        url: "<?php echo base_url('admin/reset_user_password'); ?>",
        type: 'POST',
        data: { id: userId },
        dataType: 'json',
        success: function(response) {
            if (response.success == 1) {
                prompt("New password for " + name + " (copy this and share it with them):", response.password);
            } else {
                alert(response.message ? response.message : "Failed to reset password.");
            }
        },
        error: function() {
            alert("Error while resetting password.");
        }
    });
}

function toggleUserStatus(userId, newStatus) {
    if (confirm("Are you sure you want to " + (newStatus == 1 ? "Activate" : "Deactivate") + " this user?")) {
        $.ajax({
            url: 'change_user_status',
            type: 'POST',
            data: { id: userId, status: newStatus },
            success: function(response) {
                // alert(response);
                location.reload(); // Reload page to reflect changes
            },
            error: function() {
                alert("Error while updating user status.");
            }
        });
    }
}
</script>
<script>
$(document).ready(function () {

    // Select All
    $('#select_all').click(function() {
        $('.user_checkbox').prop('checked', this.checked);
    });

    // APPROVE
    $(document).on('click', '#approveBtn', function () {

        let selected = [];

        $('.user_checkbox:checked').each(function() {
            selected.push($(this).val());
        });

        if (selected.length == 0) {
            alert("Please select at least one user.");
            return;
        }
        
        

        if (confirm("Approve selected users?")) {
            $.ajax({
                url: "<?php echo base_url('admin/approve_users'); ?>",
                type: 'POST',
                data: { ids: selected.join(',') },
                success: function(response) {
                    console.log(response);
                    alert("Approved successfully!");
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert("AJAX Error!");
                }
            });
        }
    });

    // UNAPPROVE
    $(document).on('click', '#unapproveBtn', function () {

        let selected = [];

        $('.user_checkbox:checked').each(function() {
            selected.push($(this).val());
        });
       

        if (selected.length == 0) {
            alert("Please select at least one user.");
            return;
        }

        if (confirm("Unapprove selected users?")) {
            $.ajax({
                url: "<?php echo base_url('admin/unapprove_users'); ?>",
                type: 'POST',
                data: { ids: selected.join(',') },
                success: function(response) {
                    alert("Unapproved successfully!");
                    location.reload();
                },
                error: function() {
                    alert("AJAX Error!");
                }
            });
        }
    });

});
</script>
