<script setup>
defineProps({
    listing: Object
})
</script>

<template>
    <div>
        <span class="font-bold">{{ listing.beds }} bds </span><span class="text-gray-400"> | </span>
        <span class="font-bold">{{ listing.baths }} ba </span><span class="text-gray-400"> | </span>
        <span class="font-bold">{{ listing.area }}m² </span>
    </div>
</template>
