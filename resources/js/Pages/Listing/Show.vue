<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/UI/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import PaymentCalculator from "../../Components/PaymentCalculator/PaymentCalculator.vue";

defineProps({
    listing: Object
})
</script>

<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-cols-3 gap-4">
                <div v-for="image in listing.images" :key="image.id">
                    <img :src="image.src" alt="Real estate listing image" class="rounded-md" />
                </div>
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">No Images</div>
        </Box>
        <div class="flex flex-col gap-4 md:col-span-5">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Box>
            <PaymentCalculator :price="listing.price" />
        </div>
    </div>
</template>
