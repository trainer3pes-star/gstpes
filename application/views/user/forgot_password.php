<div class="container" style="margin-top: 60px;margin-bottom: 60px">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <?php if($this->session->flashdata('successmsg')){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('successmsg'); ?>
    </div>
<?php } ?>

<?php if($this->session->flashdata('errorsmsg')){ ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('errorsmsg'); ?>
    </div>
<?php } ?>
                <div class="panel-heading">
                    <h3 class="text-center">Forgot Password</h3>
                </div>
                <div class="panel-body">
                    
                      <form action="send_reset_link" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Send Reset Link
                        </button>
                    </form>

                    <p class="text-center mt-2">
                        <a href="<?php echo base_url('home/login'); ?>">Back to Login</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
