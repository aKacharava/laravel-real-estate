<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import { route } from "ziggy";
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Button from "../../Components/UI/Button.vue";

defineProps({
    listings: Array
})
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="route('listing.show', { listing: listing.id })">
                    <Price :price="listing.price" class="text-2xl font-bold" />
                    <ListingSpace :listing="listing" class="text-lg" />
                    <ListingAddress :listing="listing" class="text-gray-500" />
                </Link>
            </div>
            <div class="flex gap-2 mt-2">
                <Button>
                    <Link :href="route('listing.edit', { listing: listing.id })">Edit</Link>
                </Button>
                <Button>
                    <Link :href="route('listing.destroy', { listing: listing.id })" method="DELETE" as="button">Delete</Link>
                </Button>
            </div>
        </Box>
    </div>
</template>

<style scoped>

</style>
