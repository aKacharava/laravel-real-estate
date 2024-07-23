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
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">{{ label }}</label>
        <input :value="formInput" @input="handleInput" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div v-if="formError" class="error">
            {{ formError }}
        </div>
    </div>
</template>
