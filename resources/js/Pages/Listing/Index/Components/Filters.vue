<script setup>
import Button from "@/Components/UI/Button.vue";
import { useForm } from "@inertiajs/vue3";
import {route} from "ziggy";

const props = defineProps({
    filters: Object
})

const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null
});

const filter = () => {
    filterForm.get(
        route('listing.Index'),
        {
            preserveState: true,
            preserveScroll: true
        }
    );
}

const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.beds = null
    filterForm.baths = null
    filterForm.areaFrom = null
    filterForm.areaTo = null
    filter()
}
</script>

<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input
                    v-model.number="filterForm.priceFrom"
                    type="text"
                    placeholder="Price from"
                    class="filter-input-left w-28"
                />
                <input
                    v-model.number="filterForm.priceTo"
                    type="text"
                    placeholder="Price to"
                    class="filter-input-right w-28"
                />
            </div>
            <div class="flex flex-nowrap items-center">
                <select v-model="filterForm.beds" class="filter-input-left w-28">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">
                        {{n}}
                    </option>
                    <option>6+</option>
                </select>
                <select v-model="filterForm.baths" class="filter-input-right w-28">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">
                        {{n}}
                    </option>
                    <option>6+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Area from" class="filter-input-left w-28" v-model.number="filterForm.areaFrom" />
                <input type="text" placeholder="Area to" class="filter-input-right w-28" v-model.number="filterForm.areaTo" />
            </div>

            <Button type="submit" :is-primary="true">Filter</Button>
            <Button type="reset" @click="clear">Clear</Button>
        </div>
    </form>
</template>
