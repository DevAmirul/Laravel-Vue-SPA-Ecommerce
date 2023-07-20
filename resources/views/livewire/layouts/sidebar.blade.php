<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed {{ (request()->is('products')) ? 'active' : '' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box2"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
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

                <li>
                    <a href="{{ route('attributes') }}">
                        <i class="bi bi-circle"></i><span>Attributes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('attributes.create') }}">
                        <i class="bi bi-circle"></i><span>Add Attributes</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('brands') }}">
                        <i class="bi bi-circle"></i><span>Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('brands.create') }}">
                        <i class="bi bi-circle"></i><span>Add Brands</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tags') }}">
                        <i class="bi bi-circle"></i><span>Tags</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tags.create') }}">
                        <i class="bi bi-circle"></i><span>Add Tags</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->




        <li class="nav-item">
            <a class="nav-link collapsed {{
                (Request::routeIs('categories') || Request::routeIs('categories.create') || Request::routeIs('categories.update') || Request::routeIs('sections') || Request::routeIs('sections.create') || Request::routeIs('subCategories') || Request::routeIs('subCategories.create') || Request::routeIs('subCategories.update')) ? 'active' : '' }}"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Categories</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <a class="nav-link collapsed {{
                (Request::routeIs('subCategories') || Request::routeIs('subCategories.create') || Request::routeIs('subCategories.update')) ? 'active' : '' }}"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('reports.brand.products') }}">
                        <i class="bi bi-circle"></i><span>Brand Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.categorized.products') }}">
                        <i class="bi bi-circle"></i><span>Categorized Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.coupons') }}">
                        <i class="bi bi-circle"></i><span>Coupons</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.customers.order') }}">
                        <i class="bi bi-circle"></i><span>Customers Order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.products.purchase') }}">
                        <i class="bi bi-circle"></i><span>Products Purchase</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.products.stock') }}">
                        <i class="bi bi-circle"></i><span>Products Stock</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.products.view') }}">
                        <i class="bi bi-circle"></i><span>Products View</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.sales') }}">
                        <i class="bi bi-circle"></i><span>Sales</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.search') }}">
                        <i class="bi bi-circle"></i><span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.shipping') }}">
                        <i class="bi bi-circle"></i><span>Shipping</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.tagged.products') }}">
                        <i class="bi bi-circle"></i><span>Tagged Products</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed {{ (Request::routeIs('orders') || Request::routeIs('orders.update') || Request::routeIs('orders.pdf')) ? 'active' : '' }}"
                href="{{ route('orders') }}">
                <i class="bi bi-list-ol"></i>
                <span>Orders</span>
            </a>
        </li>
        <!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed {{ (Request::routeIs('editors') || Request::routeIs('editors.create') || Request::routeIs('editors.update')) ? 'active' : '' }}"
                data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
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

        <li class="nav-item">
            <a class="nav-link collapsed {{
                        (Request::routeIs('sections') || Request::routeIs('sections.create')) ? 'active' : '' }}"
                data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('settings.general') }}">
                        <i class="bi bi-circle"></i><span>General Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.mail') }}">
                        <i class="bi bi-circle"></i><span>Mail Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.coupons') }}">
                        <i class="bi bi-circle"></i><span>Coupons</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.coupons.create') }}">
                        <i class="bi bi-circle"></i><span>Add Coupons</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.offers') }}">
                        <i class="bi bi-circle"></i><span>Offers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.offers.create') }}">
                        <i class="bi bi-circle"></i><span>Add Offers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.shippingMethods') }}">
                        <i class="bi bi-circle"></i><span>Shipping Methods</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.shippingMethods.create') }}">
                        <i class="bi bi-circle"></i><span>Add Shipping Methods</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('settings.shippingMethods') }}">
                <i class="bi bi-circle"></i><span>Shipping Methods</span>
                </a>
        </li> --}}


    </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed {{ (Request::routeIs('contacts') || Request::routeIs('contacts.reply')) ? 'active' : '' }}"
            href="{{ route('contacts') }}">
            <i class="bi bi-envelope-at"></i>
            <span>Contacts</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed {{ (request()->is('users')) ? 'active' : '' }}" href="{{ route('users') }}">
            <i class="bi bi-people-fill"></i>
            <span>Users</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->


    </ul>
</aside>