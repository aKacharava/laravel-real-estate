<script setup>
defineProps({
    type: String
})
</script>

<template>
    <button :type="type" class="col-span-6">
        <slot />
    </button>
</template>
