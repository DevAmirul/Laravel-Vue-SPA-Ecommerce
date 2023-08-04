<script setup>
import PageHeader from "../../components/layouts/PageHeader.vue";
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="SHOPPING CART"></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#Order Id</th>
                            <th>place On</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle">#7777777</td>
                            <td class="align-middle">Today</td>
                            <td class="align-middle">Today</td>

                            <td class="align-middle">$150</td>
                            <td class="align-middle">Pending</td>
                            <td>
                                <div class="form-group mt-0 mb-0">

                                    <select
                                        class="form-control"
                                        id="exampleFormControlSelect1"
                                    >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-primary">
                                    Details
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
</template>
