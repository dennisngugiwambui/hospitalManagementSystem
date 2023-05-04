<?php $__env->startSection('content'); ?>




<style>
    .cover {
        /* background: url(http://blog.fancyyarnbazar.com/wp-content/uploads/2018/04/architecture-2562705_1920-1024x576.jpg) no-repeat center fixed; */
        z-index: 0;
        border-bottom: 1px solid #ccc;
        /* color:#1c0404; */
}
.search-container {
  margin-bottom: 20px;
}

#phone-search {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

.button-container {
  position: relative;
  display: inline-block;
}

.main-button {
  background-color: blue;
  color: white;
  padding: 5px 10px;
  border-radius: 3px;
  border: none;
  cursor: pointer;
  font-size: 12px;
}

.sub-buttons {
  position: absolute;
  top: 100%;
  left: 0;
  background-color: white;
  border-radius: 3px;
  border: 1px solid blue;
  display: none;
  z-index: 1;
}

td {
  position: relative;
}

.main-button:hover + .sub-buttons, .sub-buttons:hover {
  display: block;
}

.view-button, .setting-button, .edit-button {
  display: block;
  padding: 5px 10px;
  border: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  font-size: 12px;
}

.view-button:hover, .setting-button:hover, .edit-button:hover {
  background-color: blue;
  color: white;
}


</style>
<div class="cover">
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="search-container">
    <input type="text" id="phone-search" placeholder="Search for phone numbers...">
  </div>
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">
            <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">
                    X
                </button>
                <?php echo e(session()->get('message')); ?>


            </div>
            <?php endif; ?>
            
            <h5 class="card-title mb-0">All users</h5>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Doctor</th>
                    <th>Ticket</th>
                    <th>Send Lab</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td>
                        <i class="fa fa-trophy"></i>
                        <?php echo e($user->id); ?>

                    </td>
                    <td><?php echo e($user->name); ?></td>
                    <td>
                        </i><span class="badge bg-success"><?php echo e($user->doctor); ?></span>
                    </td>
                    <td>
                    </i><span class="badge bg-danger"><?php echo e($user->ticket_id); ?></span>
                </td>
                    

                      <td>

                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-success" href="<?php echo e(route('user_details', $user->id)); ?>">
                                                <i class="fa fa-eye-slash"></i>view</a>
                                        </div>
                                        
                       </td>
                    </tr>
                     
                     <div class="modal right fade" id="addUser_<?php echo e($user->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Lab Comments</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo e($user->id); ?>

                              </div>
                              <div class="modal-body" style="background: yellow;">
                                  <form action="<?php echo e(route('Doctor_booking', $user->id)); ?>" method="post" enctype="multipart/form-data">
                                      <?php echo csrf_field(); ?>
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" value="<?php echo e($user->name); ?>" class="form-control" id="inputPassword" disabled>
                                        </div>
                                      </div>

                                      <div class="mb-3 row">
                                        <label for="Name" class="col-sm-2 col-form-label">Today</label>
                                        <div class="col-sm-10">
                                          <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
                                        </div>
                                      </div>
                                      <!-- Textarea 8 rows height -->
                                      <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample2" rows="8"></textarea>
                                        <label class="form-label" for="textAreaExample2">Message</label>
                                    </div>
                                      </div>

                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='<?php echo e($user->id); ?>' class="btn btn-primary btn-block text-center">Send Lab</button>
                                          
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
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Patients</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('register_patients')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Today</label>
              <div class="col-sm-10">
                <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" id="name">
              </div>
            </div>
            <div class="mb-3 row">
                <label for="Age" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                  <input type="number" name="age" class="form-control" id="age">
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
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">

            <marquee class="card-title mb-0">The patient registered in our hospital</marquee>
        </div>


    </div>
</div>
</div>


<script>
    const searchInput = document.querySelector('#phone-search');
    const tableRows = document.querySelectorAll('#user-table tbody tr');

    searchInput.addEventListener('keyup', function(event) {
        const searchTerm = event.target.value.toLowerCase();

        tableRows.forEach(function(row) {
            const phoneCell = row.cells[3];
            const phone = phoneCell.textContent.toLowerCase();

            if (phone.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel1\HospitalManagementSystem\resources\views/admin/treatment.blade.php ENDPATH**/ ?>