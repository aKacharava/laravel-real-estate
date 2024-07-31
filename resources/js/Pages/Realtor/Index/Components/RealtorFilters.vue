<script setup>
import { reactive, watch } from 'vue';
import { route } from "ziggy";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({

});

const filterForm = reactive({
    drafts: false,
    deleted: false
});

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
        <div class="my-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.drafts"
                    id="drafts"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="drafts">Drafts</label>
            </div>
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    id="deleted"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>
