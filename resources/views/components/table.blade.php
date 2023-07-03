<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $tableName }}</h1>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            {{-- <div x-data="{ message: '' }">
                                <input type="text" x-model="message">

                                <span x-text="message">
                            </div> --}}
                            
                            <form x-data="fetchProducts"
                                x-effect="getData(options.selectedDataOptions,['title','sku','stock_status','qty_in_stock','sub_category','price','discount_price','offer_price'])"
                                class="mt-2">
                                <select x-model="options.selectedDataOptions" class="form-select" aria-label="Default select example">
                                    <option selected>10</option>
                                    <template x-for="dataOption in options.showDataOptions">
                                        <option :value="dataOption" x-text="dataOption"></option>
                                    </template>
                                </select>
                            </form>

                            <nav class="navbar bg-light">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-light disabled" type="submit"><i
                                                class="bi bi-search"></i></button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                {{ $thead }}
                            </thead>
                            <tbody id="tbody">

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


                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>