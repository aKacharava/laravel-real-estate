<script setup>
import {Link, useForm} from '@inertiajs/vue3'

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
const update = () => form.put(`/listing/${props.listing.id}`);
</script>

<template>
    <form @submit.prevent="update">
        <div>
            <div>
                <label>Beds</label>
                <input v-model.number="form.beds" type="text" />
                <div v-if="form.errors.beds" class="error">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div>
                <label>Baths</label>
                <input v-model.number="form.baths" type="text" />
                <div v-if="form.errors.baths" class="error">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div>
                <label>Area</label>
                <input v-model.number="form.area" type="text" />
                <div v-if="form.errors.area" class="error">
                    {{ form.errors.area }}
                </div>
            </div>

            <div>
                <label>City</label>
                <input v-model="form.city" type="text" />
                <div v-if="form.errors.city" class="error">
                    {{ form.errors.city }}
                </div>
            </div>

            <div>
                <label>Post Code</label>
                <input v-model="form.zip_code" type="text" />
                <div v-if="form.errors.zip_code" class="error">
                    {{ form.errors.zip_code }}
                </div>
            </div>

            <div>
                <label>Street</label>
                <input v-model="form.street_name" type="text" />
                <div v-if="form.errors.street_name" class="error">
                    {{ form.errors.street_name }}
                </div>
            </div>

            <div>
                <label>Street Nr</label>
                <input v-model.number="form.street_number" type="text" />
                <div v-if="form.errors.street_number" class="error">
                    {{ form.errors.street_number }}
                </div>
            </div>

            <div>
                <label>Price</label>
                <input v-model.number="form.price" type="text" />
                <div v-if="form.errors.price" class="error">
                    {{ form.errors.price }}
                </div>
            </div>

            <div>
                <button type="submit">Edit</button>
                
            </div>
        </div>
    </form>
</template>

<style scoped>
label {
    margin-right: 2px;
}

div {
    padding: 2px;
}
.error {
    background-color: red;
    color: white;
}
</style>
