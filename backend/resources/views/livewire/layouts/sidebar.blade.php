<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed {{ ( Request::routeIs('products') ||Request::routeIs('products.create') ||Request::routeIs('products.update') || Request::routeIs('attributes') || Request::routeIs('attributes.create') ||Request::routeIs('brands')||Request::routeIs('brands.create')||Request::routeIs('brands.update') || Request::routeIs('tags')|| Request::routeIs('tags.create')) ? 'active' : '' }}"
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
                    <a href="{{ route('attributes') }}">
                        <i class="bi bi-circle"></i><span>Attributes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('brands') }}">
                        <i class="bi bi-circle"></i><span>Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tags') }}">
                        <i class="bi bi-circle"></i><span>Tags</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed {{
                (Request::routeIs('categories') || Request::routeIs('categories.create') || Request::routeIs('categories.update') || Request::routeIs('sections') || Request::routeIs('sections.create') | Request::routeIs('sections.update') || Request::routeIs('subCategories') || Request::routeIs('subCategories.create') || Request::routeIs('subCategories.update')) ? 'active' : '' }}"
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
                    <a href="{{ route('categories') }}">
                        <i class="bi bi-circle"></i><span>Category Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subCategories') }}">
                        <i class="bi bi-circle"></i><span>SubCategory Table</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed {{
                (Request::routeIs('reports.brand.products') || Request::routeIs('reports.categorized.products') || Request::routeIs('reports.coupons')|| Request::routeIs('reports.customers.order')|| Request::routeIs('reports.products.purchase')|| Request::routeIs('reports.products.stock')|| Request::routeIs('reports.products.view')|| Request::routeIs('reports.sales')|| Request::routeIs('reports.search')|| Request::routeIs('reports.shipping')) ? 'active' : '' }}"
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


            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed {{ (Request::routeIs('orders') || Request::routeIs('orders.update') || Request::routeIs('orders.pdf')) ? 'active' : '' }}"
                href="{{ route('orders') }}">
                <i class="bi bi-list-ol"></i>
                <span>Orders</span>
            </a>
        </li>
        @can('isAdmin')
            <li class="nav-item">
                <a class="nav-link collapsed {{ (Request::routeIs('editors') || Request::routeIs('editors.create') || Request::routeIs('editors.update')) ? 'active' : '' }}"
                    href="{{ route('editors') }}">
                    <i class="bi bi-pencil-square"></i><span>Editors</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::routeIs('register') ? 'active' : '' }}"
                    href="{{ route('register') }}">
                    <i class="bi bi-person"></i></i><span>Register</span>
                </a>
            </li>
        @endcan
        {{-- <li class="nav-item">
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
        </ul>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed {{ (Request::routeIs('contacts') || Request::routeIs('contacts.reply')) ? 'active' : '' }}"
                href="{{ route('contacts') }}">
                <i class="bi bi-envelope-at"></i>
                <span>Contacts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed {{ (request()->is('users')) ? 'active' : '' }}" href="{{ route('users') }}">
                <i class="bi bi-people-fill"></i>
                <span>Users</span>
            </a>
        </li>

        @can('isAdmin')
            <li class="nav-item">
                <a class="nav-link collapsed {{
                                            (Request::routeIs('settings.general') || Request::routeIs('settings.coupons.create')|| Request::routeIs('settings.coupons.update') || Request::routeIs('settings.coupons') || Request::routeIs('settings.offers.create') || Request::routeIs('settings.offers')|| Request::routeIs('settings.offers.update') || Request::routeIs('settings.shippingMethods.create') || Request::routeIs('settings.shippingMethods.update') || Request::routeIs('settings.shippingMethods')|| Request::routeIs('settings.')) ? 'active' : '' }}"
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
                        <a href="{{ route('settings.coupons') }}">
                            <i class="bi bi-circle"></i><span>Coupons</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings.offers') }}">
                            <i class="bi bi-circle"></i><span>Offers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings.shippingMethods') }}">
                            <i class="bi bi-circle"></i><span>Shipping Methods</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


    </ul>
</aside>