<script setup>
defineProps({
    type: String
})
</script>

<template>
    <div class="col-span-6">
        <button :type="type" class="btn-primary">
            <slot />
        </button>
    </div>
</template>
