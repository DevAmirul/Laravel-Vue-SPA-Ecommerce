<script setup>
import { ref } from 'vue'
import { RouterLink } from "vue-router";
import axios_C from '../../services/axios';
import PageHeader from "../../components/layouts/PageHeader.vue";

let responseData = ref();

axios_C.get('/users/orders/'+'2')
    .then(response => {
        responseData.value = response.data
    })
    .catch(error => {
        console.log(error);
    });

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
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <template v-if="responseData">
                            <template v-for="(data, key) in responseData.orders" :key="key">
                                <tr>
                                    <td class="align-middle">#{{ data.id }}</td>
                                    <td class="align-middle">{{ data.placeOn }}</td>
                                    <td class="align-middle">{{ data.quantity }}</td>
                                    <td class="align-middle">{{ data.total }}</td>
                                    <!-- check order status start -->
                                    <td v-if="data.orderStatus == 'Approved'" class="align-middle"> <button class="btn btn-sm btn-info"> Approved </button>
                                    </td>
                                    <td v-else-if="data.orderStatus == 'Delivered'" class="align-middle"><button class="btn btn-sm btn-success">Delivered </button></td>
                                    <td v-else-if="data.orderStatus == 'Shipped'" class="align-middle"><button class="btn btn-sm btn-primary">Shipped </button></td>
                                    <td v-else-if="data.orderStatus == 'Pending'" class="align-middle"><button class="btn btn-sm btn-info">Pending </button></td>
                                    <td v-else-if="data.orderStatus == 'Canceled'" class="align-middle"><button class="btn btn-sm btn-danger">Canceled </button></td>
                                    <td v-else class="align-middle"><button class="btn btn-sm btn-dark">Returned </button></td>
                                    <!-- check order status end -->
                                    <!-- check payment status start -->
                                    <td v-if="data.paymentStatus == 0" class="align-middle"> <button class="btn btn-sm btn-danger"> UnPaid </button>
                                    </td>
                                    <td v-else class="align-middle"><button class="btn btn-sm btn-success">Paid </button></td>
                                    <!-- check payment status end -->
                                    <td class="align-middle">
                                        <RouterLink :to="{ name: 'orderItems', params:{id: data.id} }" style="text-decoration: none; color: inherit">
                                            <button class="btn btn-sm btn-primary">
                                                Details
                                            </button>
                                        </RouterLink>
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
</template>
