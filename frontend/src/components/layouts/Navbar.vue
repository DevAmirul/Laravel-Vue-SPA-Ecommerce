<script setup>
</script>
<template>
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold">
                <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <RouterLink :to="{ name: 'home' }"><a class="nav-item nav-link active">Home</a></RouterLink>
                <RouterLink :to="{ name: 'shop' }"><a class="nav-item nav-link">Shop</a></RouterLink>
                <RouterLink :to="{ name: 'sale' }"><a class="nav-item nav-link">Sale Offer</a></RouterLink>
                <RouterLink :to="{ name: 'cart' }"><a class="nav-item nav-link">Cart</a></RouterLink>
                <RouterLink :to="{ name: 'wishList' }"><a class="nav-item nav-link">WishList</a></RouterLink>
                <!-- <RouterLink :to="{ name: 'productDetail'}"><a
                                class="nav-item nav-link "
                                >Product Detail</a
                            ></RouterLink> -->
                <RouterLink :to="{ name: 'contact' }"><a class="nav-item nav-link">Contact Us</a></RouterLink>
                <!-- <RouterLink :to="{ name: 'contact' }"
                    ><a class="nav-item nav-link">Terms & Conditions</a></RouterLink
                > -->
            </div>
            <div class="navbar-nav ml-auto py-0">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <RouterLink :to="{ name: 'profile' }"><a class="dropdown-item">My Profile</a></RouterLink>
                        <RouterLink :to="{ name: 'orders' }"><a class="dropdown-item">My Orders</a></RouterLink>
                        <RouterLink :to="{ name: 'wishList' }"><a class="dropdown-item">My Wishlist</a></RouterLink>
                        <RouterLink :to="{ name: 'cart' }"><a class="dropdown-item">My Cart</a></RouterLink>
                        <RouterLink :to="{ name: 'home' }"><a class="dropdown-item">Logout</a></RouterLink>
                    </div>
                </div>
                <RouterLink :to="{ name: 'login' }"><a class="nav-item nav-link">Login</a></RouterLink>
                <RouterLink :to="{ name: 'register' }"><a class="nav-item nav-link">Register</a></RouterLink>
            </div>
        </div>
    </nav>
</template>
<style>
</style>