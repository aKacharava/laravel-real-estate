<script setup>
import { route } from "ziggy";
import Box from "@/Components/UI/Box.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    listing: Object
})

const form = useForm({
    images: []
})

const upload = () => {
    form.post(
        route("realtor.listing.image.store", { listing: props.listing.id }),
        {
            onSuccess: () => form.reset("images"),
        }
    )
}

const addFiles = (event) => {
    for (const image of event.target.files) {
        form.images.push(image);
    }
}

const reset = () => form.reset("images");
</script>

<template>
    <Box>
        <template #header>
            Upload new images
        </template>
        <form
            @submit.prevent="upload"
        >
            <input type="file" multiple @input="addFiles" />
            <button type="submit" class="btn-outline ">Send</button>
            <button type="reset" @click="reset" class="btn-outline ">Reset</button>
        </form>
    </Box>
</template>
