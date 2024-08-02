<script setup>
import Box from "@/Components/UI/Box.vue";
import Slider from "@/Components/UI/Slider.vue";
import Price from "@/Components/Price.vue";
import { useForm } from "@inertiajs/vue3";
import { computed, watch } from "vue";
import { route } from "ziggy";
import { debounce } from "lodash";

const props = defineProps({
    listingId: Number,
    price: Number
})

const emit = defineEmits(['offerUpdated'])

const form = useForm({
    amount: props.price
})

const makeOffer = () => form.post(
    route('listing.offer.store', { listing: props.listingId }),
    {
        preserveScroll: true,
        preserveState: true
    }
)

const difference = computed(() => form.amount - props.price);
const minimum = computed(() => Math.round(props.price / 2));
const maximum = computed(() => Math.round(props.price * 2));

watch(
    () => form.amount,
    debounce(
    (value) => emit('offerUpdated', value)
    , 200)
);
</script>

<template>
    <Box>
        <template #header>Make an offer</template>
        <form @submit.prevent="makeOffer">
            <input v-model.number="form.amount" type="text" class="input" />
            <Slider
                v-model:slider-value="form.amount"
                label="Current bid"
                :min="minimum"
                :max="maximum"
                step="10000"
            />
            <button type="submit" class="btn-outline w-full mt-2 text-sm">Make an offer</button>
        </form>
        <div class="flex justify-between text-gray-500 mt-2">
            <label>Difference</label>
            <div>
                <Price :price="difference" />
            </div>
        </div>
    </Box>
</template>
