<script setup>
import EmptyState from "../../Components/UI/EmptyState.vue";
import Price from "../../Components/Price.vue";
import { Link } from "@inertiajs/vue3";
import {route} from "ziggy";
import Pagination from "../../Components/UI/Pagination.vue";

const props = defineProps({
    notifications: Object
})
</script>

<template>
    <h1 class="text-3xl mb-4">Your Notifications</h1>
    <section v-if="notifications.data.length" class="text-gray-700 dark:text-gray-400">
        <div v-for="notification in notifications.data" :key="notification.id" class="border-b border-gray-200 dark:border-gray-800 py-4 flex justify-between items-center">
            <div>
                <span v-if="notification.type === 'App\\Notifications\\OfferMade'">
                    Offer <Price :price="notification.data.amount" />
                    <span>
                        for <Link :href="route('realtor.listing.show', { listing: notification.data.listing_id })" class="text-indigo-600 dark:text-indigo-400">listing</Link> was made
                    </span>
                </span>
            </div>
            <div>
                <Link
                    v-if="!notification.read_at"
                    :href="route('notification.seen', { notification: notification.id })"
                    class="btn-outline text-xs font-medium uppercase"
                    as="button"
                    method="put"
                >
                    Mark as read
                </Link>
            </div>
        </div>
    </section>
    <EmptyState v-else>No notifications</EmptyState>
    <section v-if="notifications.data.length" class="w-full flex justify-center my-8">
        <Pagination :links="notifications.links" />
    </section>
</template>
