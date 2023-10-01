<script setup>
import { ref, watch } from "vue";
import { useRouter } from "vue-router";
import PageHeader from "../../components/layouts/PageHeader.vue";

const router = useRouter();
const topBarSearch = ref();

watch(topBarSearch, () => {
    router.push({ name: 'search', params: { search: topBarSearch.value } })
})

</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="500!"></PageHeader>
    <!-- Page Header End -->
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
                    <h2 class="headline text-danger">500</h2>
                    <div class="error-content">
                        <h3>
                            <i
                                class="fas fa-exclamation-triangle text-danger"
                            ></i>
                            Oops! Something went wrong.
                        </h3>
                        <p>
                            We will work on fixing that right away. Meanwhile,
                            you may
                            <RouterLink :to="{ name: 'home' }"
                                ><a href="../../index.html"
                                    >return to dashboard</a
                                ></RouterLink
                            >
                            or try using the search form.
                        </p>
                        <form @submit.prevent class="search-form py-5">
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search..."
                                    v-model.lazy="topBarSearch"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        name="submit"
                                        class="btn btn-danger"
                                    >
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.input-group -->
                        </form>
                    </div>
                </div>
                <!-- /.error-page -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>
