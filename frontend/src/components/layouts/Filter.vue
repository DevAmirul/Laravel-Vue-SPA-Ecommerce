<script setup>
import useSearch from '../../stores/Search'
import { storeToRefs } from "pinia";

const { sort, limit, search } = storeToRefs(useSearch());

</script>
<template>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <form @submit.prevent>
            <div class="input-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search by name or tag"
                    v-model.lazy="search"
                />
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
        <div class="d-flex">
            <div class="col-md-6 form-group">
                <select v-model="sort" class="custom-select">
                    <option value="latest" selected>Latest</option>
                    <option value="oldest">Oldest</option>
                    <option value="p_low_to_high">Price: low to high</option>
                    <option value="p_high_to_low">Price: high to low</option>
                    <option value="asc">Ascending</option>
                    <option value="des">Descending</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select v-model="limit" class="custom-select">
                    <option value="20" selected>20</option>
                    <option value="40">40</option>
                    <option value="48">48</option>
                    <option value="60">60</option>
                    <option value="80">80</option>
                </select>
            </div>
        </div>
    </div>
</template>