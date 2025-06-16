<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5>Welcome, <?php echo e(Auth::user()->name); ?></h5>
                            <form action="<?php echo e(route('logout')); ?>" method="GET" class="d-inline">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Profile Information</h5>
                                        <p><strong>Name:</strong> <?php echo e(Auth::user()->name); ?></p>
                                        <p><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
                                        <p><strong>Mobile:</strong> <?php echo e(Auth::user()->mobile); ?></p>
                                        <p><strong>Gender:</strong> <?php echo e(Auth::user()->gender); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Location Details</h5>
                                        <p><strong>Country:</strong> <?php echo e(Auth::user()->country->name); ?></p>
                                        <p><strong>State:</strong> <?php echo e(Auth::user()->state->name); ?></p>
                                        <p><strong>City:</strong> <?php echo e(Auth::user()->city->name); ?></p>
                                        <p><strong>Address:</strong> <?php echo e(Auth::user()->address); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\auth-app\resources\views/dashboard.blade.php ENDPATH**/ ?>