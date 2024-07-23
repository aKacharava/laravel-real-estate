<script setup>
import { useForm } from '@inertiajs/vue3'
import { route } from "ziggy";
import FormWrapper from "@/Components/UI/Form/FormWrapper.vue";

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    street_name: null,
    zip_code: null,
    street_number: null,
    price: 0,
})

const create = () => form.post(route('listing.store'))
</script>

<template>
    <form @submit.prevent="create">
        <FormWrapper :form="form" button-label="Create" />
    </form>
</template>
