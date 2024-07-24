<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from 'vue';
import { route } from "ziggy";
import Button from "../Components/UI/Button.vue";

const page = usePage();

const successMessage = computed(() => page.props.flash.success);
</script>

<template>
    <header class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.Index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.Index')">Realtrr</Link>
                </div>
                <Button class="btn-primary">
                    <Link :href="route('listing.create')">+ New Listing</Link>
                </Button>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="successMessage" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ successMessage }}
        </div>

        <slot></slot>
    </main>
</template>
