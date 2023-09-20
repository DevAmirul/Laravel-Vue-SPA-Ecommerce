<script setup>
import { RouterLink } from "vue-router";

</script>

<template>
    <!-- Page Header Start -->
    <!-- <PageHeader pageName="Success Page"></PageHeader> -->
    <!-- Page Header End -->
    <!-- Contact Start -->
    <section class="mail-seccess section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <!-- Error Inner -->
                    <div class="success-inner my-5">
                        <h1><i class="fa fa-times-circle" aria-hidden="true"></i><span>Payment Canceled!</span>
                        </h1>
                        <p>please try again...</p>

                        <RouterLink style="text-decoration: none; color: inherit" :to="{ name: 'checkout' }"><a
                                class="btn btn-primary btn-lg">Go Checkout</a>
                            ></RouterLink>
                    </div>

                    <!--/ End Error Inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->
</template>
<style>
.mail-seccess {
    text-align: center;
    background: #fff;
    border-top: 1px solid #eee;
}

.mail-seccess .success-inner {
    display: inline-block;
}

.mail-seccess .success-inner h1 {
    font-size: 100px;
    text-shadow: 3px 5px 2px #3333;
    color: #ff0404;
    font-weight: 700;
}

.mail-seccess .success-inner h1 span {
    display: block;
    font-size: 25px;
    color: #333;
    font-weight: 600;
    text-shadow: none;
    margin-top: 20px;
}

.mail-seccess .success-inner p {
    padding: 20px 15px;
}

.mail-seccess .success-inner .btn {
    color: #fff;
}</style>