<script setup>
import Price from "../Price.vue";

defineProps({
    label: String,
    price: Number
})
</script>

<template>
    <div class="flex justify-between">
        <div>{{ label }}&nbsp;</div>
        <div>
            <Price :price="price" />
        </div>
    </div>
</template>
