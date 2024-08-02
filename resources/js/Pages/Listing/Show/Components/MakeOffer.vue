<script setup>
import Box from "@/Components/UI/Box.vue";
import Slider from "@/Components/UI/Slider.vue";
import Price from "@/Components/Price.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    listingId: Number,
    price: Number
})

const form = useForm({
    amount: props.price
})

const difference = computed(() => form.amount - props.price);
const minimum = computed(() => props.price / 2);
const maximum = computed(() => props.price * 2);
</script>

<template>
    <Box>
        <template #header>Make an offer</template>
        <div>
            <input v-model.number="form.amount" type="text" class="input" />
            <Slider
                v-model:slider-value="form.amount"
                label="Current bid"
                :min="minimum"
                :max="maximum"
                step="10000"
            />
            <button class="btn-outline w-full mt-2 text-sm">Make an offer</button>
        </div>
        <div class="flex justify-between text-gray-500 mt-2">
            <label>Difference</label>
            <div>
                <Price :price="difference" />
            </div>
        </div>
    </Box>
</template>
