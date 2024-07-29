<script setup>
import FormInput from "./FormInput.vue";
import { toRefs } from 'vue';
import Button from "../Button.vue";

const props = defineProps({
    form: Object,
    buttonLabel: String
});

const { form } = toRefs(props);
</script>

<template>
    <div class="grid grid-cols-6 gap-4">
        <FormInput class="col-span-2" label="Beds" v-model:form-input="form.beds" :form-error="form.errors.beds" />
        <FormInput class="col-span-2" label="Baths" v-model:form-input="form.baths" :form-error="form.errors.baths" />
        <FormInput class="col-span-2" label="Area" v-model:form-input="form.area" :form-error="form.errors.area" />
        <FormInput class="col-span-4" label="City" v-model:form-input="form.city" :form-error="form.errors.city" />
        <FormInput class="col-span-2" label="Zip code" v-model:form-input="form.zip_code" :form-error="form.errors.zip_code" />
        <FormInput class="col-span-4" label="Street" v-model:form-input="form.street_name" :form-error="form.errors.street_name" />
        <FormInput class="col-span-2" label="Street Nr" v-model:form-input="form.street_number" :form-error="form.errors.street_number" />
        <FormInput class="col-span-6" label="Price" v-model:form-input="form.price" :form-error="form.errors.price" />

        <div>
            <Button type="submit" :is-primary="true">{{ buttonLabel }}</Button>
        </div>
    </div>
</template>
