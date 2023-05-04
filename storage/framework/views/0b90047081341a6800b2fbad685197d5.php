<?php $__env->startSection('content'); ?>
<style>
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #d92121;
    }

</style>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        

        <div class="card-header">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-plus">Add ward</i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Wards</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background: rgb(220, 220, 191);">
          <form action="<?php echo e(route('ward_patients')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ward Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="image" id="inputPassword">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ward Name</label>
                <div class="col-sm-10">
                  <input type="text" name="ward_name" class="form-control" id="inputPassword">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Available beds</label>
                <div class="col-sm-10">
                  <input type="number" name="available_beds" class="form-control" id="inputPassword">
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="id" value='' class="btn btn-primary">Save changes</button>
                
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
          <h3 class="card-title">Ward Details</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4 mb-3">
                <div class="card">
                  <img class="card-img-top" src="imagename/<?php echo e($ward->image); ?>" style="height: 250px; width: 300px;" alt="<?php echo e($ward->ward_name); ?>">
                  <div class="card-body">
                    <h3 class="card-title"> <b><?php echo e($ward->ward_name); ?></b></h3>
                    <p class="card-text">
                      <strong>Available Beds:</strong> <?php echo e($ward->available_beds); ?><br>
                      <strong>Booked Beds:</strong> <?php echo e($ward->booked_beds); ?><br>
                      <strong>Total Beds:</strong> <?php echo e($ward->total_beds); ?>

                    </p>
                    <?php if($ward->available_beds >= 1): ?>
                      <a href="<?php echo e(route('Patient_ward_profile', $ward->id)); ?>" class="btn btn-primary">Book Now</a>
                    <?php else: ?>
                      <button type="button" class="btn btn-danger">Not available</button>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel1\HospitalManagementSystem\resources\views/admin/wards.blade.php ENDPATH**/ ?>