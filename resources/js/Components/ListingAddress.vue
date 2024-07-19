<script setup>
defineProps({
    listing: Object
})
</script>

<template>
    <span>
        {{ listing.street_name }} {{ listing.street_number }}, {{ listing.city }} for {{ listing.price }}
    </span>
</template>

<style scoped>

</style>
