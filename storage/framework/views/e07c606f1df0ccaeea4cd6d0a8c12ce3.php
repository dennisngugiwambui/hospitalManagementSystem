<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu"  style="background: rgb(231, 199, 199);">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/home">Home</a></li>
                            <li><a href="<?php echo e(route('profile', auth()->user()->id)); ?>">Profile</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo e(route('appointments', auth()->user()->id)); ?>">Appointments</a></li>
                            <li><a href="/medications">Medications</a></li>
                            <li><a href="/clinics">Clinics</a></li>
                            <li><a href="/updates">Updates</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Important</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="sending_mail">Sending  Mail</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
<?php /**PATH C:\xampp\htdocs\Laravel1\HospitalManagementSystem\resources\views/Patients/sidebar.blade.php ENDPATH**/ ?>