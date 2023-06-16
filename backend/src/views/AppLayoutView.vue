<script setup>
import { RouterView } from 'vue-router';
import Navbar from '../components/Navbar.vue';
import Sidebar from '../components/Sidebar.vue';
import Footer from '../components/Footer.vue';

</script>

<template>
    <div class="">
        <div class="wrapper">
            <!-- Navbar -->
            <Navbar />
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <Sidebar />
            <!-- Content Wrapper. Contains page content -->
            <RouterView />
            <!-- /.content-wrapper -->
            <Footer></Footer>
        </div>
        <!-- ./wrapper -->
    </div>
</template>