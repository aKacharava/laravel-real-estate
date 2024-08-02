<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/vue3";
import Price from "@/Components/Price.vue";
import { ref } from "vue";

const props = defineProps({
    offer: Object,
    listingPrice: Number
});

const difference = ref(props.offer.amount - props.listingPrice);
const madeOn = ref(new Date(props.offer.created_at).toDateString());
</script>

<template>
    <Box>
        <template #header>Offer #{{ offer.id }}</template>

        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl" />

                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>

                <div class="text-gray-500 text-sm">
                    Made by John
                </div>

                <div class="text-gray-500 text-sm">
                    Made on {{ madeOn }}
                </div>
            </div>
            <div>
                <Link
                    class="btn-outline text-xs font-medium"
                    as="button"
                >
                    Accept
                </Link>
            </div>
        </section>
    </Box>
</template>
