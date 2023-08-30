<script setup>
import useSearch from '../stores/Search'
import { storeToRefs } from "pinia";

const { pageNumber } = storeToRefs(useSearch());
const { links } = defineProps(['links']);

function changePageNumber(url) {
    pageNumber.value = url.split('=')[1]
}
</script>
<template>
    <div class="col-12 pb-1 mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-3">
                <template v-for="(data, key) in links" :key="key">
                    <li v-if="key === 0" :class="['page-item', data.url === null ? 'disabled' : '']">
                        <button @click="changePageNumber(data.url)" class="page-link" style="cursor: pointer;" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </button>
                    </li>
                    <li v-else-if="key == links.length - 1" :class="['page-item', data.url === null ? 'disabled' : '']">
                        <button @click="changePageNumber(data.url)" class="page-link" style="cursor: pointer;" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </button>
                    </li>
                    <li v-else :class="['page-item', data.active ? 'active' : '']">
                        <button @click="changePageNumber(data.url)" class="page-link" style="cursor: pointer;">{{ data.label }}</button>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>
<style>
</style>