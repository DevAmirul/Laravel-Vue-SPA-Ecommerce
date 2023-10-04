@push('title')
Attributes
@endpush
<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <hr>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex justify-content-between">
                <h1>Attributes</h1>
                <a class="btn btn-primary" href="{{ route('attributes.create') }}"> <i class="bi bi-plus-circle"></i> Add
                </a>
            </div>
        </div>
        <!-- End Page Title -->
        @if ($attributes->count() == null)
        @livewire('layouts.empty-page',['tableName'=> 'Attributes Table'])
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
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>