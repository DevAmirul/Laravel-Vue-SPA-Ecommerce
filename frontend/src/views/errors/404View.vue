
<template>
<!-- Content Wrapper. Contains page content -->
    <div class="container mt-5 mb-5 px-5">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2"></div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content mt-5 mb-5 px-5">
                <div class="error-page">
                    <h2 class="headline text-warning">404</h2>
                    <div class="error-content">
                        <h3>
                            <i
                                class="fas fa-exclamation-triangle text-warning"
                            ></i>
                            Oops! Page not found.
                        </h3>
                        <p>
                            We could not find the page you were looking for.
                            Meanwhile, you may
                            <RouterLink :to="{ name: 'home' }"
                                ><a href="../../index.html">return to dashboard</a></RouterLink
                            >

                            or try using the search form.
                        </p>
                        <form class="search-form py-5">
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        name="submit"
                                        class="btn btn-warning"
                                    >
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.input-group -->
                        </form>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>
