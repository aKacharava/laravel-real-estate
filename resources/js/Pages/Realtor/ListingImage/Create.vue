<script setup>
import { route } from "ziggy";

const props = defineProps({
    listing: Object
})

console.log("listing", props.listing)
</script>

<template>
    <form
        enctype="multipart/form-data"
        method="POST"
        :action="route('realtor.listing.image.store', { listing: listing.id })"
    >
        <input type="file" multiple name="images[]" />
        <button type="submit">Send</button>
    </form>
</template>
