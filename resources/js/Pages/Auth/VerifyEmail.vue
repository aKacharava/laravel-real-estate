<script setup>
import { Link } from "@inertiajs/vue3";
import {route} from "ziggy";
</script>

<template>
    <div>You need to verify your email first!</div>
    <div>
        <Link
            :href="route('verification.send')"
            method="post"
            as="button"
            class="text-indigo-600 dark:text-indigo-400"
        >
            Resend verification email
        </Link>
    </div>
</template>
