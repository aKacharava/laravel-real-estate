<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const counter = ref(0);

setInterval(() => counter.value++, 1000)
</script>

<template>
    <Link href="/">Home</Link>&nbsp;
    <Link href="/hello">Hello</Link>

    <div> counter {{ counter }} </div>

    <slot></slot>
</template>

<style scoped>

</style>
