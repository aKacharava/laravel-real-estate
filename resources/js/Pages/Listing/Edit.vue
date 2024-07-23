<script setup>
import { useForm } from '@inertiajs/vue3'
import { route } from "ziggy";
import FormWrapper from "@/Components/UI/Form/FormWrapper.vue";

const props = defineProps({
    listing: Object
})

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street_name: props.listing.street_name,
    street_number: props.listing.street_number,
    zip_code: props.listing.zip_code,
    price: props.listing.price,
})
const update = () => form.put(route('listing.update', { listing: props.listing.id }));
</script>

<template>
    <form @submit.prevent="update">
        <FormWrapper :form="form" button-label="Edit" />
    </form>
</template>
