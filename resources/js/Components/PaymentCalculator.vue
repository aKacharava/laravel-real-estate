<script setup>
import Slider from "./UI/Slider.vue";
import Box from "./UI/Box.vue";
import Price from "./Price.vue";
import { ref, computed } from "vue";

const props = defineProps({
    price: Object,
})

const interestRate = ref(2.5);
const duration = ref(25);

const monthlyPayment = computed(() => {
    const principle = props.price;
    const monthlyInterest = interestRate.value / 100 / 12;
    const numberOfPaymentMonths = duration.value * 12;

    return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1);
})
</script>

<template>
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
    </Box>
</template>
