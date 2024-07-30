<script setup>

</script>

<template>
    <form>
        <div class="my-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    id="drafts"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="drafts">Drafts</label>
            </div>
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    id="deleted"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>
