<script setup>
import { reactive, watch, computed } from 'vue';
import { route } from "ziggy";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
    filters: Object
})

const sortLabels = {
    created_at: [
        {
            label: 'Latest',
            value: 'desc',
        },
        {
            label: 'Oldest',
            value: 'asc',
        }
    ],
    price: [
        {
            label: 'Most Expensive',
            value: 'desc',
        },
        {
            label: 'Cheapest',
            value: 'asc',
        }
    ]
}

const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? 'created_at',
    order: props.filters.order ?? 'desc'
});

const sortOptions = computed(() => sortLabels[filterForm.by])

watch(
    filterForm,
    debounce(() => {
        router.get(
            route('realtor.listing.Index'),
            filterForm,
            {
                preserveState: true,
                preserveScroll: true
            },
        )
    }, 1000)
);
</script>

<template>
    <form>
        <div class="my-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    id="deleted"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>
            <div>
                <select class="filter-input-left w-24" v-model="filterForm.by">
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                </select>
                <select class="filter-input-right" v-model="filterForm.order">
                    <option v-for="option in sortOptions" :key="option.value" :value="option.value">
                        {{ option.label }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>
