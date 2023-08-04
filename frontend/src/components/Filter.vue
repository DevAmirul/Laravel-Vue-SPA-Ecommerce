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
            <div class="form-group mt-0 mb-0 mx-3">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Latest</option>
                    <option>Oldest</option>
                    <option>Best Rating</option>
                    <option>Price: low to high</option>
                    <option>Price: high to low</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
            </div>
            <div class="form-group mt-0 mb-0">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>20</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
    </div>
</template>