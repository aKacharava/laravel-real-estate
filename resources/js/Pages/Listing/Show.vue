<script setup>
import ListingAddress from "../../Components/ListingAddress.vue";

defineProps({
    listing: Object
})
</script>

<template>
    <ListingAddress :listing="listing" />
</template>

<style scoped>

</style>
