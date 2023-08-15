<script setup>
</script>
<template>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <form action="">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search by name or tag"
                    v-model="searchStr"
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
                <select v-model="dataPerPage" class="custom-select">
                    <option value="latest" selected>Latest</option>
                    <option value="oldest">Oldest</option>
                    <option value="lth">Price: low to high</option>
                    <option value="htl">Price: high to low</option>
                    <option value="asc">Ascending</option>
                    <option value="des">Descending</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select v-model="dataFilter" class="custom-select">
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