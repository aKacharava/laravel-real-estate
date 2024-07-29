<script setup>

</script>

<template>
    <form>
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input
                    type="text"
                    placeholder="Price from"
                    class="filter-input-left"
                />
                <input
                    type="text"
                    placeholder="Price to"
                    class="filter-input-right"
                />
            </div>
            <div class="flex flex-nowrap items-center">
                <select class="filter-input-left">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">
                        {{n}}
                    </option>
                    <option>6+</option>
                </select>
                <select class="filter-input-right">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">
                        {{n}}
                    </option>
                    <option>6+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Area from" class="filter-input-left" />
                <input type="text" placeholder="Area to" class="filter-input-right" />
            </div>

            <button type="submit">Filter</button>
            <button type="reset">Clear</button>
        </div>
    </form>
</template>
