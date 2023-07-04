<main id="main" class="main">
    <x-layouts.page-title :pageTitle='$pageTitle' :pageUrl='$pageUrl'></x-layouts.page-title>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                            {{ $slot }}
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    @foreach ($columnNamesArr as $columnName)
                                        <th scope="col">{{ $columnName }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($tableData as $Data)
                                <tr>
                                    @if ($image)
                                        <td><img src="{{ $Data->image }}" alt="{{ $Data->image }}" width="50px" height="50px">
                                        </td>
                                    @endif
                                    @foreach ($tableDataColumnNames as $tableDataColumnName)
                                        @if ($tableDataColumnName === 'image')
                                            @continue
                                        @endif

                                        <td>{{ $Data->$tableDataColumnName }}</td>

                                    @endforeach
                                        <td class="d-flex p-3">
                                            <button class="btn btn-primary " value="2"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger mx-1"><i class="bi bi-trash"></i></button>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <div class="d-flex flex-column">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                                <h6 class="text-center">Showing 1 to 5 of 5 entries</h6>
                            </div>
                        </nav>
                    @foreach ($tableDataColumnNames as $tableDataColumnName)
                        {{ $tableDataColumnName }}
                    @endforeach

                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>