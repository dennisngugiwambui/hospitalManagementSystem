<?php $__env->startSection('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">

        <div>
            <!-- Button trigger modal -->
            <style>
                .btn-custom {
                    padding-top: 15px;
                    padding-bottom: 30px;
                    animation: pulse 1s infinite;
                    color: #fff;
                    font-size: 1.2rem;
                    margin-right: 5px;
                }

                @keyframes pulse {
                    0% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.1);
                    }
                    100% {
                        transform: scale(1);
                    }
                }
            </style>
<button type="button" class="btn btn-primary btn-custom text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-flower">
        Add Doctor
    </i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(route('adding_doctors')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Image')); ?></label>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <input class="form-control" name="image" type="file" id="formFile" required>
                          </div>

                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Name')); ?></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" required>

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="speciality" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Doctor Speciality')); ?></label>

                    <div class="col-md-6">
                            <select class="form-select" name="speciality" id="floatingSelect" aria-label="Floating label select example" required>
                              <option disabled selected>--choose doctor--</option>
                              <option value="Dentist">Dentist</option>
                              <option value="Cardilogist">Cardilogist</option>
                              <option value="ENT Specialist">ENT Specialist</option>
                              <option value="astrologist">astrologist</option>
                              <option value="neuroanatomist">neuroanatomist</option>
                              <option value="Lab">Lab</option>
                              <option value="Counselling">Counselling</option>
                              <option value="VCT">VCT</option>
                            </select>

                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
      </div>
    </div>
  </div>
        </div>
        <form action="<?php echo e(route('search-users')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by phone number" name="search">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <div class="card-header">
            <h5 class="card-title mb-0">All Doctors</h5>
        </div>
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Doctor</th>
                    <th>Speciality</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td>
                        <button type="button" class="btn btn-primary">
                            <span class="badge badge-light">
                                <?php echo e($users->id); ?>

                            </span>
                        </button>
                    </td>
                    <td><?php echo e($users->name); ?></td>
                    <td><?php echo e($users->speciality); ?></td>
                    <td><img src="imagename/<?php echo e($users->image); ?>" class="img-fluid" style="height: 50px; width: 50px;"></td>
                      <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editUser_<?php echo e($users->id); ?>">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser_<?php echo e($users->id); ?>"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                       </td>
                    </tr>
                     
                     <div class="modal right fade" id="deleteUser_<?php echo e($users->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo e($users->id); ?>

                              </div>
                              <div class="modal-body">
                                
                                  <form action="<?php echo e(route('destroy-user', $users->id)); ?>" method="post" enctype="multipart/form-data">
                                      <?php echo csrf_field(); ?>
                                      <p>Do you want to permanently delete <i class="fa fa-user"></i> <?php echo e($users->name); ?> from the database?</p>


                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='<?php echo e($users->id); ?>' class="btn btn-primary btn-block">Delete User</button>
                                          
                                            </div>
                                  </form>
                              </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>
</div>

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">
        <div class="card-header">
          <div class="mb-3 row">
            
            
        
          </div>

    </div>

</div>
<?php echo Toastr::message(); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel1\HospitalManagementSystem\resources\views/admin/doctors.blade.php ENDPATH**/ ?>