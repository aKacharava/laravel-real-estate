<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import { route } from "ziggy";

const form = useForm({
    email: null,
    password: null
})

const login = () => form.post(route('login.store'));
</script>

<template>
    <form @submit.prevent="login">
        <div class="w-full sm:w-1/2 mx-auto">
            <div>
                <label for="email" class="label">E-mail (username)</label>
                <input type="text" id="email" class="input" v-model="form.email" />
                <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" class="input" v-model="form.password" />
                <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Login</button>
                <div class="mt-2 text-center">
                    <Link :href="route('user-account.create')" class="text-sm text-gray-500">Don't have an account? Sign Up</Link>
                </div>
            </div>
        </div>
    </form>
</template>
