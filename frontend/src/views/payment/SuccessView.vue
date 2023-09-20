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
    				<div class="success-inner my-5" >
    					<h1><i class="fa fa-check-circle" aria-hidden="true"></i><span>Payment Successful!</span></h1>
                        <small>You'll receive a confirmation email shortly.</small>
    					<p>Thanks for your order!</p>


                        <RouterLink style="text-decoration: none; color: inherit"
                            :to="{ name: 'home' }"
                            ><a class="btn btn-primary btn-lg">Continue Shopping</a>
                            ></RouterLink >
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
	color: #13e000;
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
.mail-seccess .success-inner .btn{
	color:#fff;
}
</style>