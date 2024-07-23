<script setup>
defineProps({
    label: String,
    sliderValue: Number,
    min: String,
    max: String,
    step: String
})

const emit = defineEmits(['update:sliderValue'])

const handleSlider = (event) => {
    emit('update:sliderValue', parseFloat(event.target.value))
}
</script>

<template>
    <div>
        <label>
            {{ label }} (<span>{{ sliderValue }}</span>)
        </label>
        <input
            type="range"
            :min="min"
            :max="max"
            :step="step"
            class="slider"
            @input="handleSlider"
            :value="sliderValue"
        />
    </div>
</template>
