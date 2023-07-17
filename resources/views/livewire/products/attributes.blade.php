@push('title')
Sub Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->

    <main id="main" class="main">
        <x-layouts.page-title pageTitle='Attribute' pageUrl='Attribute'></x-layouts.page-title>
        <!-- End Page Title -->
        @if ($attributes->count() == null)
        <x-empty-table :tableName='$tableName'></x-empty-table>
        @else
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>values</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($attributes as $attribute)
                                    <tr>
                                        <td> {{ $attribute->id }} </td>
                                        <td> {{ $attribute->name }} </td>
                                        @php
                                        $value = $attribute->attributeOption->implode('value', ', ');
                                        @endphp
                                        <td> {{ $value }} </td>
                                        <td>
                                            <button
                                                onclick="confirm('Are you sure,You want to delete this Data?') || event.stopImmediatePropagation();"
                                                wire:click='destroy({{$attribute->id}})' class="btn btn-danger mx-1"><i
                                                    class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif




    </main>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>