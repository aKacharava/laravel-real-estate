<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/vue3";
import Price from "@/Components/Price.vue";
import { ref } from "vue";
import { route } from "ziggy";

const props = defineProps({
    offer: Object,
    listingPrice: Number,
    isSold: Boolean
});

const difference = ref(props.offer.amount - props.listingPrice);
const madeOn = ref(new Date(props.offer.created_at).toDateString());
</script>

<template>
    <Box>
        <template #header>Offer #{{ offer.id }} <span v-if="offer.accepted_at" class="bg-green-200 dark:bg-green-900 text-green-900 dark:text-green-200 p-1 rounded-md uppercase ml-1">accepted</span></template>

        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl" />

                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>

                <div class="text-gray-500 text-sm">
                    Made by {{ offer.bidder.name }}
                </div>

                <div class="text-gray-500 text-sm">
                    Made on {{ madeOn }}
                </div>
            </div>
            <div>
                <Link
                    v-if="!isSold"
                    :href="route('realtor.offer.accept', { offer: offer.id })"
                    class="btn-outline text-xs font-medium"
                    as="button"
                    method="put"
                >
                    Accept
                </Link>
            </div>
        </section>
    </Box>
</template>
