<template>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <form action="">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search by name"
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
                <select class="custom-select">
                    <option selected>Latest</option>
                    <option>Oldest</option>
                    <option>Price: low to high</option>
                    <option>Price: high to low</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select class="custom-select">
                    <option selected>20</option>
                    <option>1</option>
                    <option>1</option>
                    <option>1</option>
                    <option>1</option>
                </select>
            </div>


        </div>
    </div>
</template>