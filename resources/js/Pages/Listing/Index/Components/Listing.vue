<script setup>
import { Link } from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import { route } from "ziggy";
import { useMonthlyPayment } from "../../../../Composables/useMonthlyPayment.js";

const props = defineProps({
    listing: Object
})

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>

<template>
    <Box>
        <div>
            <Link :href="route('listing.show', { listing: listing.id })">
                <div class="flex items-center">
                    <Price :price="listing.price" class="text-2xl font-bold" />&nbsp;
                    <div class="text-xs text-gray-500">
                        <Price :price="monthlyPayment" /> pm
                    </div>
                </div>
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Link>
        </div>
    </Box>
</template>
