<script setup>
import { watch } from "vue";
import { debounce } from "lodash";

const props = defineProps({
    label: String,
    sliderValue: Number,
    min: String|Number,
    max: String|Number,
    step: String
})

const emit = defineEmits(['update:sliderValue'])

const handleSlider = (event) => {
    emit('update:sliderValue', parseFloat(event.target.value))
}

watch(
    () => props.sliderValue,
    debounce(
    (value) => emit('update:sliderValue', value)
    , 200)
);
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
