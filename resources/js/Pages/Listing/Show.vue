<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import MakeOffer from "./Show/Components/MakeOffer.vue";
import { usePage } from "@inertiajs/vue3";
import {computed, ref} from "vue";
import PaidView from "@/Components/PaymentCalculator/PaidView.vue";
import Slider from "@/Components/UI/Slider.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment.js";
import OfferMade from "./Show/Components/OfferMade.vue";
import EmptyState from "../../Components/UI/EmptyState.vue";

const props = defineProps({
    listing: Object,
    offerMade: Object
});

const page = usePage();

const interestRate = ref(2.5);
const duration = ref(25);
const offer = ref(props.listing.price);

const user = computed(() => page.props.user)

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(offer, interestRate, duration);
</script>

<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box v-if="listing.images.length" class="md:col-span-7 flex items-center w-full">
            <div class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                    alt="Real estate listing image"
                    class="rounded-md"
                />
            </div>
        </Box>
        <EmptyState v-else class="md:col-span-7 flex items-center">
            No Images
        </EmptyState>
        <div class="flex flex-col gap-4 md:col-span-5">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Box>
            <Box>
                <template #header>
                    Monthly Payment
                </template>
                <Slider label="Interest rate %" v-model:slider-value="interestRate" min="0.1" max="30" step="0.1" />
                <Slider label="Duration in years" v-model:slider-value="duration" min="3" max="35" step="1" />

                <div class="text-gray-600 dark:text-gray-300 mt-2">
                    <div class="text-gray-400">Your monthly payment</div>
                    <Price :price="monthlyPayment" class="text-3xl"/>
                </div>
                <div class="mt-2 text-gray-500">
                    <PaidView label="Total paid" :price="totalPaid" />
                    <PaidView label="Principal paid" :price="listing.price" />
                    <PaidView label="Interest paid" :price="totalInterest" />
                </div>
            </Box>
            <div v-if="user">
                <MakeOffer
                    v-if="!offerMade"
                    :listing-id="listing.id"
                    :price="listing.price"
                    @offer-updated="offer = $event"
                />
                <OfferMade v-else :offer="offerMade" />
            </div>
        </div>
    </div>
</template>
