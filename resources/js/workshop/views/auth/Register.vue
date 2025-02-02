<script setup>
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

// Состояния
const errors = ref({});
const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const register = async () => {
  try {
    const response = await axios.post('/auth/register', form);
    console.log(response)
    localStorage.setItem('access_token', response.data.access_token)
    // Успешная регистрация
    router.push('/users');
  } catch (error) {
    if (error.response && error.response.data.errors) {
      errors.value = error.response.data.errors;
    }
  }
};
</script>

<template>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="#" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder">AppName</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Adventure starts here 🚀</h4>
            <p class="mb-4">Make your app management easy and fun!</p>
             <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                id="name"
                class="form-control"
                v-model="form.name"
                placeholder="Enter your name"
              />
              <!-- <p v-if="errors.value.email" class="text-danger">
                {{ errors.value.email[0] }}
              </p> -->
            </div>

            <!-- Email Input -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                id="email"
                class="form-control"
                v-model="form.email"
                placeholder="Enter your email"
              />
              <!-- <p v-if="errors.value.email" class="text-danger">
                {{ errors.value.email[0] }}
              </p> -->
            </div>

            <!-- Password Input -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                v-model="form.password"
              />
              <!-- <p v-if="errors.value.password" class="text-danger">
                {{ errors.value.password[0] }}
              </p> -->
            </div>

            <!-- Password Confirmation Input -->
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Password Confirmation</label>
              <input
                type="password"
                id="password_confirmation"
                class="form-control"
                v-model="form.password_confirmation"
              />
              <!-- <p v-if="errors.value.passwordConfirmation" class="text-danger">
                {{ errors.value.passwordConfirmation[0] }}
              </p> -->
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn btn-primary w-100" @click="register">
              Register
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
