<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">

            <div class="panel panel-default">

                <div class="panel-heading text-center">
                    <h3>Reset Password</h3>
                </div>

                <div class="panel-body">

                    <!-- Success Message -->
                    <?php if($this->session->flashdata('successmsg')){ ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('successmsg'); ?>
                        </div>
                    <?php } ?>

                    <!-- Error Message -->
                    <?php if($this->session->flashdata('errorsmsg')){ ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errorsmsg'); ?>
                        </div>
                    <?php } ?>

                    <!-- Reset Form -->
                    <form method="post" action="<?php echo base_url('home/save_new_password'); ?>">

                        <input type="hidden" name="user_id" value="<?php echo base64_encode($user_id); ?>">
                        <input type="hidden" name="varification_code" value="<?php echo base64_encode($varification_code); ?>">

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                        </div>



                        <button type="submit" class="btn btn-success btn-block">
                            Update Password
                        </button>

                    </form>

                    <hr>

                    <p class="text-center">
                        <a href="<?php echo base_url('home/login'); ?>">
                            ← Back to Login
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>