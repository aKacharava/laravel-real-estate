<script setup>
const props = defineProps({
    label: String,
    formInput: Number|String,
    formError: Object|String
});

const emit = defineEmits(['update:formInput']);

const handleInput = (event) => {
    emit('update:formInput', event.target.value);
}
</script>

<template>
    <div>
        <label class="label">{{ label }}</label>
        <input :value="formInput" @input="handleInput" type="text" class="input" />
        <div v-if="formError" class="error">
            {{ formError }}
        </div>
    </div>
</template>
