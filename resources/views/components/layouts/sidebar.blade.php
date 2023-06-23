<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('productsTable') }}">
                        <i class="bi bi-circle"></i><span>Products Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('editProducts', ['id' => '1']) }}">
                        <i class="bi bi-circle"></i><span>Edit Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('addProducts') }}">
                        <i class="bi bi-circle"></i><span>Add Products</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categoriesTable') }}">
                        <i class="bi bi-circle"></i><span>Categories Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('editCategories', ['id' => '1']) }}">
                        <i class="bi bi-circle"></i><span>Edit Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('addCategories') }}">
                        <i class="bi bi-circle"></i><span>Add Categories</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Sub-Categories</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('subCategoriesTable') }}">
                        <i class="bi bi-circle"></i><span>Sub-Categories Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('editSubCategories') }}">
                        <i class="bi bi-circle"></i><span>Edit Sub-Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('addSubCategories') }}">
                        <i class="bi bi-circle"></i><span>Add Sub-Categories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Editors</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('editorsTable') }}">
                        <i class="bi bi-circle"></i><span>Editors Table</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('profile',['id' => 1]) }}">
                        <i class="bi bi-circle"></i><span>Edit Editors</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('addEditors') }}">
                        <i class="bi bi-circle"></i><span>Add Editors</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Charts Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('ordersTable') }}">
                        <i class="bi bi-circle"></i><span>Orders Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ordersDetails',['id' => 1]) }}">
                        <i class="bi bi-circle"></i><span>Orders Details</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('usersTable') }}">
                        <i class="bi bi-circle"></i><span>Users Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('usersDetails',['id' => 1]) }}">
                        <i class="bi bi-circle"></i><span>User Details</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('contactUsTable') }}">
                <i class="bi bi-question-circle"></i>
                <span>Contact Table</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('404') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('500') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Error 500</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

    </ul>
</aside>
