<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy";
import RealtorFilters from "./Index/Components/RealtorFilters.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    listings: Object,
    filters: Object
})
</script>

<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
        <RealtorFilters class="flex gap-2 mb-4" :filters="filters" />
    </section>
    <section class="grid grid-cols1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed' : listing.deleted_at }">
            <div class="flex flex-col md:flex-row gap-2 mg:items-center justify-between">
                <div :class="{'opacity-25' : listing.deleted_at }">
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" />
                    </div>

                    <ListingAddress :listing="listing" />
                </div>
                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                    <a
                        class="btn-outline text-xs font-medium"
                        :href="route('listing.show', { listing: listing.id })"
                        target="_blank"
                    >
                        Preview
                    </a>
                    <Link
                        :href="route('realtor.listing.edit', { listing: listing.id })"
                        class="btn-outline text-xs font-medium"
                    >
                        Edit
                    </Link>
                    <Link
                        v-if="listing.deleted_at"
                        :href="route('realtor.listing.restore', { listing: listing.id })"
                        class="btn-outline text-xs font-medium"
                        as="button"
                        method="put"
                    >
                        Restore
                    </Link>
                    <Link
                        v-else
                        :href="route('realtor.listing.destroy', { listing: listing.id })"
                        class="btn-outline text-xs font-medium"
                        as="button"
                        method="delete"
                    >
                        Delete
                    </Link>
                </div>
            </div>
        </Box>
    </section>

    <section v-if="listings.data.length" class="w-full flex justify-center my-4">
        <Pagination :links="listings.links" />
    </section>
</template>
