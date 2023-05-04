<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">

            <h5 class="card-title mb-0">All users</h5>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Tciket id</th>
                    <th>Doctor Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->patient_name); ?></td>
                    <td><?php echo e($user->patient_phone); ?></td>
                    <td>
                        <i class="fa fa-trophy"></i><span class="badge bg-success"><?php echo e($user->ticket_id); ?></span>
                    </td>
                    
                    <td><?php echo e($user->doctor_name); ?></td>
                      <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('lab_testing', $user->id)); ?>" class="btn btn-sm btn-success">
                                                <i class="fa fa-edit"></i>View</a>
                                        </div>
                       </td>
                    </tr>
                     
                     <div class="modal right fade" id="editUser_<?php echo e($user->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Upgrade User</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo e($user->id); ?>

                              </div>
                              <div class="modal-body" style="background: yellow;">
                                  <form action="" method="post" enctype="multipart/form-data">
                                      <?php echo csrf_field(); ?>
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option disabled selected>Open this select menu</option>
                                                <option value="Platinum">Platinum(Level3)</option>
                                                <option value="Silver">Silver(level2)</option>
                                                <option value="Gold">Gold(level1)</option>
                                              </select>
                                        </div>
                                      </div>

                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='<?php echo e($user->id); ?>' class="btn btn-primary btn-block text-center">Upgrade User</button>
                                          
                                            </div>
                                  </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>
</div>
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
    </div>
</div>


<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<?php echo Toastr::message(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel1\HospitalManagementSystem\resources\views/admin/lab.blade.php ENDPATH**/ ?>