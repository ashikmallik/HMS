 <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{route('dashboard')}}" class="brand-link">
                    <!--begin::Brand Image--> <img src="{{asset('assets/images/logo.png')}}" alt="HMS Logo"
                        class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                        class="brand-text fw-light">HMS</span> <!--end::Brand Text--> </a>
                <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                        aria-label="Main navigation" data-accordion="false" id="navigation">
                        <li class="nav-item"> <a href="{{route('dashboard')}}" class="nav-link"> <i
                                    class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi bi-person-lines-fill"></i>
                                <p>
                                     Patients <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-person-lines-fill"></i>
                                        <p>Patient List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-hospital-fill"></i>
                                        <p>Add New Patient</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Admitted Patients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Discharged Patients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Medical History</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Billing & Invoices</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi-people-fill"></i>
                                <p>
                                     Doctor <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Doctor List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Doctor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Schedule Management</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Assign Patients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Doctor Appointments</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-list-check"></i>
                                <p>
                                     Appointment <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-list-check"></i>
                                        <p>All Appointments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Book New Appointment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Appointment Calendar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Reschedule / Cancel</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-capsule-pill"></i>
                                <p>
                                     Medicine <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('medicines.index')}}" class="nav-link"><i class="nav-icon bi bi-capsule-pill"></i>
                                        <p>Medicine List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('medicines.create')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Medicine</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('stock.index')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Stock Management</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Expired Medicines</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-file-earmark-medical"></i>
                                <p>
                                     Lab Management <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-file-earmark-medical"></i>
                                        <p>Test Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add New Test</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Test Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Assign Test to Patient</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>
                                     Billing & Accounts <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Generate Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Payments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Expense List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Income Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Financial Summary</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-check-circle-fill"></i>
                                <p>
                                     Bed Management <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Ward List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add New Ward</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Bed Allocation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Bed Availability</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-journal-text"></i>
                                <p>
                                     Operation Management <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Operation Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Surgery Team</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Operation History</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-person-badge-fill"></i>
                                <p>
                                     Staff & User Roles <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Staff List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Staff</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Role & Permission (Admin, Doctor, Receptionist)</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                                <p>
                                     Reports <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-file-earmark-text-fill"></i>
                                        <p>Patient Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Doctor Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Appointment Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Revenue Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"></i><i class="nav-icon bi bi-person-circle"></i>
                                <p>
                                     Settings <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../widgets/small-box.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>General Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Profile Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Notification Settings</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar-->
