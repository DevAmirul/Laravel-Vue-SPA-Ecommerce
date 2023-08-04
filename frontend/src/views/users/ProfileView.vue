<script setup>
import PageHeader from "../../components/layouts/PageHeader.vue";
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="MY PROFILE"></PageHeader>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <div class="container my-5">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex flex-column align-items-center text-center"
                            >
                                <div class="mt-3">
                                    <h4>John Doe</h4>
                                    <p class="text-primary mb-1">01834513106</p>
                                    <p class="text-primary mb-1">
                                        mailbox.amirul@gmail.com
                                    </p>
                                    <p class="text-muted font-size-sm">
                                        Bay Area, San Francisco, CA
                                    </p>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Orders:</h6>
                                    <span class="text-primary">50</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Review:</h6>
                                    <span class="text-primary">50</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Cancellations:</h6>
                                    <span class="text-primary">50</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="John Doe"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="john@example.com"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="(239) 816-9029"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Province</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="(239) 816-9029"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="(239) 816-9029"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="Bay Area, San Francisco, CA"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Picture</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="file"
                                        class="form-control"
                                        value="Bay Area, San Francisco, CA"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="inlineRadioOptions"
                                            id="inlineRadio1"
                                            value="option1"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="inlineRadio1"
                                            >Male</label
                                        >
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="inlineRadioOptions"
                                            id="inlineRadio2"
                                            value="option2"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="inlineRadio2"
                                            >Women</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="button"
                                        class="btn btn-primary px-4"
                                        value="Save Changes"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="John Doe"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="John Doe"
                                    />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="button"
                                        class="btn btn-primary px-4"
                                        value="Save Changes"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
</template>
<style scoped>
.card {
    margin-top: 20px;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0.25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%),
        0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: 0.5rem !important;
}
</style>
