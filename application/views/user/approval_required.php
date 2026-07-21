

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            height: 100vh;
        }
        .approval-box {
            max-width: 450px;
            margin: auto;
            margin-top: 10%;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom:50px;
        }
        .icon {
            font-size: 60px;
            color: #ffc107;
        }
        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
        }
    </style>


<div class="approval-box">
    
    <div class="icon mb-3">
        ⏳
    </div>

    <h3 class="mb-3 text-warning">Approval Pending</h3>

    <p class="text-muted">
        Your account is currently under review by the administrator.
        <br>Please wait until your account is approved.
    </p>

    <hr>

    <p class="small text-muted">
        You will be notified once your account is activated.
    </p>

    <div class="mt-4">
        <a href="<?= base_url('home/login'); ?>" class="btn btn-outline-primary btn-custom">
            Back to Login
        </a>
    </div>

</div>

