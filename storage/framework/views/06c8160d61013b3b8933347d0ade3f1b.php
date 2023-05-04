<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/home">
                    <span class="align-middle">Denno Hosi Admin</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Management
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="/home">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        
                        <a class="sidebar-link" href="<?php echo e(route('profile', $name)); ?>">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Tools & Components
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('allusers', Auth::user()->id)); ?>">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Users</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('doctors', Auth::user()->id)); ?>">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Doctors</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('contacted')); ?>">
                            <i class="align-middle" data-feather="square"></i> <span
                                class="align-middle">Contacted</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/receptionist">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Reception</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/treatment">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Treatment</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('lab')); ?>">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Lab</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('wards')); ?>">
                            <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Wards</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Plugins & Addons
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('pharmacy')); ?>">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Pharmacy</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('admitted')); ?>">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span
                                class="align-middle">Admitted</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo e(route('paid_cases')); ?>">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Payment</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/Rules">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Cleared</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
<?php /**PATH C:\xampp\htdocs\laravel1\HospitalManagementSystem\resources\views/components/side-bar.blade.php ENDPATH**/ ?>