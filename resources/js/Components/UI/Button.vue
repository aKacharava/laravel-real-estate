<script setup>
defineProps({
    type: String,
    isPrimary: Boolean
})
</script>

<template>
    <button :type="type" :class="['col-span-6', isPrimary ? 'btn-primary' : '']">
        <slot />
    </button>
</template>
