<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    links: Array
})
</script>

<template>
    <Link
        v-for="(link, index) in links"
        :href="link.url ?? ''"
        :key="index"
        class="py-2 px-4 rounded-md"
        :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active}"
        v-html="link.label"
    />
</template>
