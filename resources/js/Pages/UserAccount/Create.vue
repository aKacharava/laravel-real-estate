<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { route } from "ziggy";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
})

const register = () => form.post(route('user-account.store'));
</script>

<template>
    <form @submit.prevent="register">
        <div class="w-full sm:w-1/2 mx-auto">
            <div>
                <label for="name" class="label">Your Name</label>
                <input type="text" id="name" class="input" v-model="form.name" />
                <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
            </div>
            <div class="mt-4">
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
                <label for="password_confirmation" class="label">Confirm password</label>
                <input type="password" id="password_confirmation" class="input" v-model="form.password_confirmation" />
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Create account</button>

                <div class="mt-2 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500">Already have an account? Sign in</Link>
                </div>
            </div>
        </div>
    </form>
</template>
