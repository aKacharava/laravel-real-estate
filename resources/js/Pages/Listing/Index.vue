<script setup>
defineProps({
    listings: Array
})
</script>

<template>
    <div v-for="listing in listings">
        {{listing.city}}
    </div>
</template>

<style scoped>

</style>
