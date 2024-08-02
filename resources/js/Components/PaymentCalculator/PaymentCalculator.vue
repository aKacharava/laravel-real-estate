<script setup>
import Slider from "../UI/Slider.vue";
import Box from "../UI/Box.vue";
import Price from "../Price.vue";
import { ref } from "vue";
import { useMonthlyPayment } from "../../Composables/useMonthlyPayment.js";
import PaidView from "./PaidView.vue";

const props = defineProps({
    price: Number,
})

const interestRate = ref(2.5);
const duration = ref(25);

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.price, interestRate, duration);
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
        <div class="mt-2 text-gray-500">
            <PaidView label="Total paid" :price="totalPaid" />
            <PaidView label="Principal paid" :price="price" />
            <PaidView label="Interest paid" :price="totalInterest" />
        </div>
    </Box>
</template>
