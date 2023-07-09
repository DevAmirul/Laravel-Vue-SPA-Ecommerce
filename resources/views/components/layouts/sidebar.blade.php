<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
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
                    <a href="{{ route('products') }}">
                        <i class="bi bi-circle"></i><span>Products Table</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="bi bi-circle"></i><span>Add Products</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Sections</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('sections') }}">
                        <i class="bi bi-circle"></i><span>Section Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sections.create') }}">
                        <i class="bi bi-circle"></i><span>Add Section</span>
                    </a>
                </li>

            </ul>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Categories</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categories') }}">
                        <i class="bi bi-circle"></i><span>Categories Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.create') }}">
                        <i class="bi bi-circle"></i><span>Add Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subCategories') }}">
                        <i class="bi bi-circle"></i><span>SubCategories Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subCategories.create') }}">
                        <i class="bi bi-circle"></i><span>Add SubCategories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('orders') }}">
                        <i class="bi bi-circle"></i><span>Orders Table</span>
                    </a>
                </li>

                

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i></i><span>Editors</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ route('editors') }}">
                        <i class="bi bi-circle"></i><span>Editors Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('editors.create') }}">
                        <i class="bi bi-circle"></i><span>Add Editors</span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('contacts') }}">
                <i class="bi bi-question-circle"></i>
                <span>Contact Table</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users') }}">
                <i class="bi bi-question-circle"></i>
                <span>Users Table</span>
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
