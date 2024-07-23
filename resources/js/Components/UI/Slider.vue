<script setup>
defineProps({
    label: String,
    min: Number,
    max: Number,
    step: Number
})
</script>

<template>
    <div>
        <label>{{ label }}</label>
        <input
            type="range"
            :min="min"
            :max="max"
            :step="step"
            class="slider"
        />
    </div>
</template>
