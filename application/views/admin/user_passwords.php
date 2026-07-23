<div class="container py-5">
   <div class="content-wrapper">
        <div class="container" style="font-size:14px;">
            <div class="mypage">
                <div class="row">
                    <div class="col-xs-10">
                        <ol class="breadcrumb">
                            <li><a target="" href="">Admin</a></li>
                            <li><span><a href="" target="_self">Passwords</a></span></li>
                        </ol>
                    </div>
                </div>

                <div class="container">
                    <div class="row invsumm">
                        <div class="col-xs-12 col-sm-12 taxp">
                            <h4>Approved Students &mdash; Passwords</h4>
                        </div>
                    </div>
                    <div class="tabpane">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive text-center">
                                    <table class="table table-bordered table-striped col-xs-12">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Contact</th>
                                                <th class="text-center">Course</th>
                                                <th class="text-center">Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (@$results as $result) { ?>
                                            <tr>
                                                <td><?php echo $result->name; ?></td>
                                                <td><?php echo $result->email; ?></td>
                                                <td><?php echo $result->contact; ?></td>
                                                <td><?php echo $result->course; ?></td>
                                                <td>
                                                    <?php if (strpos($result->password, '$2y$') === 0) { ?>
                                                        <em>reset to view</em>
                                                        &mdash;
                                                        <a href="javascript:void(0);" onclick="resetPasswordFromTable(<?php echo $result->id; ?>, '<?php echo addslashes($result->name); ?>')">Reset Password</a>
                                                    <?php } else { ?>
                                                        <?php echo $result->password; ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
function resetPasswordFromTable(userId, name) {
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
                location.reload();
            } else {
                alert(response.message ? response.message : "Failed to reset password.");
            }
        },
        error: function() {
            alert("Error while resetting password.");
        }
    });
}
</script>
