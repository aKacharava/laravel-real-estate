<script setup>
defineProps({
    type: String
})
</script>

<template>
    <div class="col-span-6">
        <button :type="type" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md transition-all duration-200">
            <slot />
        </button>
    </div>
</template>
