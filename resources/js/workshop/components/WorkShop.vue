<script setup>
import Navbar from './includes/Navbar.vue';
import Footer from './includes/Footer.vue';

console.log(888)
</script>

<template>
   <!-- Navbar -->
    <Navbar />

    <router-view />


    <!-- Footer -->
    <Footer />
</template>
