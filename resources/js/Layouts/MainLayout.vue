<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from 'vue';
import { route } from "ziggy";
import Button from "../Components/UI/Button.vue";

const page = usePage();

const successMessage = computed(() => page.props.flash.success);

const user = computed(() => page.props.user)
const notificationCount = computed(() => page.props.user.notificationCount > 9 ? '9+' : page.props.user.notificationCount)
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
                <div v-if="user" class="flex items-center gap-4">
                    <div class="text-gray-500 relative pr-2 py-2 text-lg">
                        <i class="fi fi-ss-bell"></i>
                        <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                            {{ notificationCount }}
                        </div>
                    </div>

                    <Link :href="route('realtor.listing.create')">
                        <Button :is-primary="true">+ New Listing</Button>
                    </Link>
                    <Link :href="route('realtor.listing.Index')" class="text-sm text-gray-500">
                        {{ user.name }}
                    </Link>
                    <Link :href="route('logout')" method="delete" as="button">
                        <Button :is-primary="true">
                            Logout
                        </Button>
                    </Link>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">
                        <Button :is-primary="true">Register</Button>
                    </Link>
                    <Link :href="route('login')">Sign-in</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="successMessage" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ successMessage }}
        </div>

        <slot></slot>
    </main>

    <footer class="text-center text-gray-500">
        Uicons by <a href="https://www.flaticon.com/uicons" target="_blank" class="hover:text-gray-300 transition-all duration-300">Flaticon</a>
    </footer>
</template>
