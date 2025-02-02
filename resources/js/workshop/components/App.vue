<script setup>
import { ref, reactive, onMounted } from "vue";

import { useRoute } from 'vue-router';
import WorkShop from './WorkShop.vue';
import Login from '../views/auth/Login.vue';
import Register from '../views/auth/Register.vue';


const route = useRoute();
const accessToken = ref(false)

onMounted(async () => {
  getAccessToken();
});

const getAccessToken = () => {
    accessToken.value = localStorage.getItem('access_token')
}

</script>

<template>

    <WorkShop v-if="accessToken && route.name !== 'auth.login' && route.name !== 'auth.register'" />

    <!-- Main content -->
    <Login  v-if="!accessToken && route.name === 'auth.login'" />

    <Register  v-if="!accessToken && route.name === 'auth.register'" />



</template>
