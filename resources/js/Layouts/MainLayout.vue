<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from 'vue';
// import { ref } from "vue";
//
// const counter = ref(0);
//
// setInterval(() => counter.value++, 1000)

const page = usePage();

const successMessage = computed(() => page.props.flash.success);
</script>

<template>
    <Link href="/">Home</Link>&nbsp;
    <Link href="/hello">Hello</Link>

<!--    <div> counter {{ counter }} </div>-->
    <div v-if="page.props.flash.success" class="success">
        {{ successMessage }}
    </div>

    <slot></slot>
</template>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
