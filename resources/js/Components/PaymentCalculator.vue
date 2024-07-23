<script setup>
import Slider from "./UI/Slider.vue";
import Box from "./UI/Box.vue";
import Price from "./Price.vue";
</script>

<template>
    <Box>
        <template #header>
            Monthly Payment
        </template>
        <Slider label="Interest rate (2.5%)" min="0.1" max="30" step="0.1" />
        <Slider label="Duration (25 years)" min="3" max="35" step="1" />

        <div class="text-gray-600 dark:text-gray-300 mt-2">
            <div class="text-gray-400">Your monthly payment</div>
            <Price :price="500" class="text-3xl"/>
        </div>
    </Box>
</template>
