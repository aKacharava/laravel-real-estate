<script setup>
import { computed } from "vue";

const props = defineProps({
    price: [Number, String]
})

const formatedPrice = computed(() => {
    return Number(props.price).toLocaleString('de-DE', {
        style: 'currency',
        currency: "EUR",
        maximumFractionDigits: 0
    })
})
</script>

<template>
    <span>{{formatedPrice}}</span>
</template>
