<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

// Реактивные переменные для состояния авторизации
const isAuthenticated = ref(false);
const userName = ref('');

// Проверка аутентификации
const checkAuthentication = () => {
  const user = JSON.parse(localStorage.getItem('user')); // Пример данных из localStorage
  if (user) {
    isAuthenticated.value = true;
    userName.value = user.name;
  }
};

// Логика выхода
const logout = () => {
  localStorage.removeItem('user'); // Очистка данных пользователя
  isAuthenticated.value = false;
  userName.value = '';
  router.push('/login'); // Перенаправление на страницу входа
};

// Запуск проверки аутентификации при монтировании компонента
onMounted(() => {
  checkAuthentication();
});
</script>



<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/"> Laravel </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto"></ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          <li v-if="!isAuthenticated" class="nav-item">
            <router-link :to="{name: 'auth.login'}" class="nav-link">Login</router-link>
          </li>
          <li v-if="!isAuthenticated" class="nav-item">
            <router-link :to="{name: 'auth.register'}" class="nav-link">Register</router-link>
          </li>
          <li v-if="isAuthenticated" class="nav-item dropdown">
            <a
              id="navbarDropdown"
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              {{ userName }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <button class="dropdown-item" @click="logout">Logout</button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
