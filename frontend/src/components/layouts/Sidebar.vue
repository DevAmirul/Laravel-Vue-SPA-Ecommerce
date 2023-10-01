<script setup>
import { onMounted, ref } from 'vue'
import useAxios from '../../services/axios';
import { RouterLink, useRoute } from "vue-router";
import useSearch from '../../stores/Search'
import { storeToRefs } from "pinia";
import useAlert from "../../services/alert";

const { attribute, maxPrice, minPrice } = storeToRefs(useSearch());

const responseData = ref();
const min = ref(minPrice.value);
const max = ref(maxPrice.value);

// Fetch sidebar's attributes, categories and brands.
onMounted(() => {
    useAxios.get('/sidebar')
        .then(response => {
            responseData.value = response.data
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
} )

// Set Attribute value to path attribute query.
function setAttributeValueToAttributeFilter(attributeValue){
    if (attribute.value == '') {
        attribute.value = attributeValue
    } else{
        if (attribute.value.search(attributeValue) == -1) {
            attribute.value += '|' + attributeValue
        } else{
            const newArr = attribute.value.split('|');
            const index = newArr.indexOf(attributeValue)
            newArr.splice(index, 1);
            attribute.value = newArr.join('|')
        }
    }
}

// Set price value to path price query.
function addPriceFilter(min, max){
    if (min < max) {
        minPrice.value = min
        maxPrice.value = max
    }else{
        useAlert().topAlert('info', 'The minimum value must be less than the maximum value.')
    }
}
</script>
<template>
    <div v-if="responseData" class="col-lg-3 col-md-12">
        <div class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">All Categories</h5>
            <nav>
                <div v-if="responseData.allCategory">
                    <ul  v-for="(data, key) in responseData.allCategory" :key='key' class="mcd-menu">
                        <li>
                            <a class="active">
                                <h6>{{ data.name }}</h6>
                            </a>
                            <template v-if="data.category">
                                <ul>
                                <template v-for="(cateData, cateKey) in data.category" :key='cateKey' >
                                        <li>
                                            <RouterLink :to="{ name: 'categories', params: { slug: cateData.slug }}" style="text-decoration: none; color: inherit">

                                                <a>
                                                    {{ cateData.name }}
                                                </a >
                                            </RouterLink>

                                            <ul>
                                                <template v-if="cateData.sub_category">
                                                    <template v-for="(subCateData, subCateKey) in cateData.sub_category" :key='subCateKey' >
                                                        <li>
                                                            <RouterLink :to="{ name: 'subCategories', params: { slug: subCateData.slug } }" style="text-decoration: none; color: inherit">
                                                                <a >
                                                                    {{ subCateData.name }}
                                                                </a >
                                                            </RouterLink>
                                                        </li>
                                                    </template>
                                                </template>
                                            </ul>
                                        </li>
                                    </template>
                                </ul>
                            </template>
                        </li>

                        </ul>
                </div>
            </nav>
        </div>
        <!-- Price Start -->
        <div class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
            <form @submit.prevent="addPriceFilter(min, max)">
                <div class="d-flex">
                    <div class="form-group col-5">
                        <input
                                type="number"
                                class="form-control"
                                id="minPrice"
                                placeholder="Min"
                                v-model="min"

                            />
                    </div>
                    <div class="form-group col-5">
                        <input
                                type="number"
                                class="form-control"
                                id="maxPrice"
                                placeholder="Max"
                                v-model="max"
                            />
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Price End -->
        <!-- attribute Start -->
        <template v-if="responseData.sidebarFilter">

            <div class="border-bottom mb-4 pb-4">
                <template v-for="(data, key) in responseData.sidebarFilter" :key="key">
                    <h5 class="font-weight-semi-bold mb-4 mt-5">Filter by {{ data.name }}</h5>
                    <template v-for="(dataOption, keyOption) in data.attribute_option" :key="keyOption">
                        <form>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3" >
                                <input
                                    type="checkbox"
                                    class="custom-control-input"
                                    :checked="(attribute) ? attribute.search(dataOption.value) !== -1 : null"
                                    :id="dataOption.id"
                                    :value="dataOption.value"
                                    @click="setAttributeValueToAttributeFilter(dataOption.value)"
                                />
                                <label class="custom-control-label" :for="dataOption.id"
                                    >{{ dataOption.value }}</label
                                >
                            </div>
                        </form>
                    </template>
                </template>
            </div>

        </template>
        <!-- attribute end -->

        <div v-if="responseData.sidebarBrand" class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">All Brands</h5>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <template v-for="(data, key) in responseData.sidebarBrand" :key='key'>
                        <RouterLink :to="{ name: 'brands', params: { slug: data.slug } }" style="text-decoration: none; color: inherit">
                            <a class="nav-item nav-link">{{ data.name }}</a>
                        </RouterLink>
                    </template>
                </div>
            </nav>
        </div>

    </div>
</template>


<style>
.clearfix:before,
.clearfix:after {
    content: " ";
    display: table;
}

.clearfix:after {
    clear: both;
}
.clearfix {
    zoom: 1;
}

@media only screen and (min-width: 1200px) {
    .container {
        width: 1210px;
    }
}

@media only screen and (min-width: 960px) and (max-width: 1199px) {
    .container {
        width: 1030px;
    }
}

@media only screen and (min-width: 768px) and (max-width: 959px) {
    .container {
        width: 682px;
    }
}

@media only screen and (min-width: 480px) and (max-width: 767px) {
    .container {
        width: 428px;
        margin: 0 auto;
    }
}

@media only screen and (max-width: 479px) {
    .container {
        width: 320px;
        margin: 0 auto;
    }
}

.mcd-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    background: #fff;
    /*height: 100px;*/
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;

    /* == */
    width: 250px;
    /* == */
}
.mcd-menu li {
    position: relative;
    /*float:left;*/
}
.mcd-menu li a {
    display: block;
    text-decoration: none;
    padding: 7px 20px;
    color: #777;
    /*text-align: center;
  border-right: 1px solid #E7E7E7;*/

    /* == */
    text-align: left;
    height: 36px;
    position: relative;
    border-bottom: 1px solid #eee;
    /* == */
}
.mcd-menu li a i {
    /*display: block;
  font-size: 30px;
  margin-bottom: 10px;*/

    /* == */
    float: left;
    font-size: 20px;
    margin: 0 10px 0 0;
    /* == */
}
/* == */
.mcd-menu li a p {
    float: left;
    margin: 0;
}
/* == */

.mcd-menu li a h6 {
    display: block;
    text-transform: uppercase;
}
.mcd-menu li a small {
    display: block;
    font-size: 10px;
}

.mcd-menu li a i,
.mcd-menu li a h6,
.mcd-menu li a small {
    position: relative;

    transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -webkit-transition: all 300ms linear;
}
.mcd-menu li:hover > a i {
    opacity: 1;
    -webkit-animation: moveFromTop 300ms ease-in-out;
    -moz-animation: moveFromTop 300ms ease-in-out;
    -ms-animation: moveFromTop 300ms ease-in-out;
    -o-animation: moveFromTop 300ms ease-in-out;
    animation: moveFromTop 300ms ease-in-out;
}
.mcd-menu li:hover a h6 {
    opacity: 1;
    -webkit-animation: moveFromLeft 300ms ease-in-out;
    -moz-animation: moveFromLeft 300ms ease-in-out;
    -ms-animation: moveFromLeft 300ms ease-in-out;
    -o-animation: moveFromLeft 300ms ease-in-out;
    animation: moveFromLeft 300ms ease-in-out;
}
.mcd-menu li:hover a small {
    opacity: 1;
    -webkit-animation: moveFromRight 300ms ease-in-out;
    -moz-animation: moveFromRight 300ms ease-in-out;
    -ms-animation: moveFromRight 300ms ease-in-out;
    -o-animation: moveFromRight 300ms ease-in-out;
    animation: moveFromRight 300ms ease-in-out;
}

.mcd-menu li:hover > a {
    color: #e67e22;
}
.mcd-menu li a.active {
    position: relative;
    color: #e67e22;
    border: 0;
    /*border-top: 4px solid #e67e22;
  border-bottom: 4px solid #e67e22;
  margin-top: -4px;*/
    box-shadow: 0 0 5px #ddd;
    -moz-box-shadow: 0 0 5px #ddd;
    -webkit-box-shadow: 0 0 5px #ddd;

    /* == */
    border-left: 4px solid #e67e22;
    border-right: 4px solid #e67e22;
    margin: 0 -4px;
    /* == */
}
.mcd-menu li a.active:before {
    content: "";
    position: absolute;
    /*top: 0;
  left: 45%;
  border-top: 5px solid #e67e22;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;*/

    /* == */
    top: 42%;
    left: 0;
    border-left: 5px solid #e67e22;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    /* == */
}

/* == */
.mcd-menu li a.active:after {
    content: "";
    position: absolute;
    top: 42%;
    right: 0;
    border-right: 5px solid #e67e22;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
}
/* == */

@-webkit-keyframes moveFromTop {
    from {
        opacity: 0;
        -webkit-transform: translateY(200%);
        -moz-transform: translateY(200%);
        -ms-transform: translateY(200%);
        -o-transform: translateY(200%);
        transform: translateY(200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateY(0%);
        -moz-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }
}
@-webkit-keyframes moveFromLeft {
    from {
        opacity: 0;
        -webkit-transform: translateX(200%);
        -moz-transform: translateX(200%);
        -ms-transform: translateX(200%);
        -o-transform: translateX(200%);
        transform: translateX(200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        -ms-transform: translateX(0%);
        -o-transform: translateX(0%);
        transform: translateX(0%);
    }
}
@-webkit-keyframes moveFromRight {
    from {
        opacity: 0;
        -webkit-transform: translateX(-200%);
        -moz-transform: translateX(-200%);
        -ms-transform: translateX(-200%);
        -o-transform: translateX(-200%);
        transform: translateX(-200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        -ms-transform: translateX(0%);
        -o-transform: translateX(0%);
        transform: translateX(0%);
    }
}

.mcd-menu li ul,
.mcd-menu li ul li ul {
    position: absolute;
    height: auto;
    min-width: 200px;
    padding: 0;
    margin: 0;
    background: #fff;
    /*border-top: 4px solid #e67e22;*/
    opacity: 0;
    visibility: hidden;
    transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -webkit-transition: all 300ms linear;
    /*top: 130px;*/
    z-index: 1000;

    /* == */
    left: 280px;
    top: 0px;
    border-left: 4px solid #e67e22;
    /* == */
}
.mcd-menu li ul:before {
    content: "";
    position: absolute;
    /*top: -8px;
  left: 23%;
  border-bottom: 5px solid #e67e22;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;*/

    /* == */
    top: 25px;
    left: -9px;
    border-right: 5px solid #e67e22;
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    /* == */
}
.mcd-menu li:hover > ul,
.mcd-menu li ul li:hover > ul {
    display: block;
    opacity: 1;
    visibility: visible;
    /*top: 100px;*/

    /* == */
    left: 250px;
    /* == */
}
/*.mcd-menu li ul li {
  float: none;
}*/
.mcd-menu li ul li a {
    padding: 10px;
    text-align: left;
    border: 0;
    border-bottom: 1px solid #eee;

    /* == */
    height: auto;
    /* == */
}
.mcd-menu li ul li a i {
    font-size: 16px;
    display: inline-block;
    margin: 0 10px 0 0;
}
.mcd-menu li ul li ul {
    left: 230px;
    top: 0;
    border: 0;
    border-left: 4px solid #e67e22;
}
.mcd-menu li ul li ul:before {
    content: "";
    position: absolute;
    top: 15px;
    /*left: -14px;*/
    /* == */
    left: -9px;
    /* == */
    border-right: 5px solid #e67e22;
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
}
.mcd-menu li ul li:hover > ul {
    top: 0px;
    left: 200px;
}

/*.mcd-menu li.float {
  float: right;
}*/
.mcd-menu li a.search {
    /*padding: 29px 20px 30px 10px;*/
    padding: 10px 10px 15px 10px;
    clear: both;
}
.mcd-menu li a.search i {
    margin: 0;
    display: inline-block;
    font-size: 18px;
}
.mcd-menu li a.search input {
    border: 1px solid #eee;
    padding: 10px;
    background: #fff;
    outline: none;
    color: #777;

    /* == */
    width: 170px;
    float: left;
    /* == */
}
.mcd-menu li a.search button {
    border: 1px solid #e67e22;
    /*padding: 10px;*/
    background: #e67e22;
    outline: none;
    color: #fff;
    margin-left: -4px;

    /* == */
    float: left;
    padding: 10px 10px 11px 10px;
    /* == */
}
.mcd-menu li a.search input:focus {
    border: 1px solid #e67e22;
}

.search-mobile {
    display: none !important;
    background: #e67e22;
    border-left: 1px solid #e67e22;
    border-radius: 0 3px 3px 0;
}
.search-mobile i {
    color: #fff;
    margin: 0 !important;
}

@media only screen and (min-width: 960px) and (max-width: 1199px) {
    .mcd-menu {
        margin-left: 10px;
    }
}

@media only screen and (min-width: 768px) and (max-width: 959px) {
    .mcd-menu {
        width: 200px;
    }
    .mcd-menu li a {
        height: 30px;
    }
    .mcd-menu li a i {
        font-size: 22px;
    }
    .mcd-menu li a h6 {
        font-size: 12px;
    }
    .mcd-menu li a small {
        font-size: 10px;
    }
    .mcd-menu li a.search input {
        width: 120px;
        font-size: 12px;
    }
    .mcd-menu li a.search buton {
        padding: 8px 10px 9px 10px;
    }
    .mcd-menu li > ul {
        min-width: 180px;
    }
    .mcd-menu li:hover > ul {
        min-width: 180px;
        left: 200px;
    }
    .mcd-menu li ul li > ul,
    .mcd-menu li ul li ul li > ul {
        min-width: 150px;
    }
    .mcd-menu li ul li:hover > ul {
        left: 180px;
        min-width: 150px;
    }
    .mcd-menu li ul li ul li:hover > ul {
        left: 150px;
        min-width: 150px;
    }
    .mcd-menu li ul a {
        font-size: 12px;
    }
    .mcd-menu li ul a i {
        font-size: 14px;
    }
}

@media only screen and (min-width: 480px) and (max-width: 767px) {
    .mcd-menu {
        width: 50px;
    }
    .mcd-menu li a {
        position: relative;
        padding: 12px 16px;
        height: 20px;
    }
    .mcd-menu li a small {
        display: none;
    }
    .mcd-menu li a h6 {
        display: none;
    }
    .mcd-menu li a:hover h6,
    .mcd-menu li a.active h6 {
        display: block;
        font-size: 10px;
        padding: 3px 0;
        position: absolute;
        bottom: 0px;
        left: 0;
        background: #e67e22;
        color: #fff;
        min-width: 100%;
        text-transform: lowercase;
        font-weight: normal;
        text-align: center;
    }
    .mcd-menu li .search {
        display: none;
    }

    .mcd-menu li > ul {
        min-width: 180px;
        left: 70px;
    }
    .mcd-menu li:hover > ul {
        min-width: 180px;
        left: 50px;
    }
    .mcd-menu li ul li > ul,
    .mcd-menu li ul li ul li > ul {
        min-width: 150px;
    }
    .mcd-menu li ul li:hover > ul {
        left: 180px;
        min-width: 150px;
    }
    .mcd-menu li ul li ul li > ul {
        left: 35px;
        top: 45px;
        border: 0;
        border-top: 4px solid #e67e22;
    }
    .mcd-menu li ul li ul li > ul:before {
        left: 30px;
        top: -9px;
        border: 0;
        border-bottom: 5px solid #e67e22;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
    }
    .mcd-menu li ul li ul li:hover > ul {
        left: 30px;
        min-width: 150px;
        top: 35px;
    }
    .mcd-menu li ul a {
        font-size: 12px;
    }
    .mcd-menu li ul a i {
        font-size: 14px;
    }
}

@media only screen and (max-width: 479px) {
    .mcd-menu {
        width: 50px;
    }
    .mcd-menu li a {
        position: relative;
        padding: 12px 16px;
        height: 20px;
    }
    .mcd-menu li a small {
        display: none;
    }
    .mcd-menu li a h6 {
        display: none;
    }
    .mcd-menu li a:hover h6,
    .mcd-menu li a.active h6 {
        display: block;
        font-size: 10px;
        padding: 3px 0;
        position: absolute;
        bottom: 0px;
        left: 0;
        background: #e67e22;
        color: #fff;
        min-width: 100%;
        text-transform: lowercase;
        font-weight: normal;
        text-align: center;
    }
    .mcd-menu li .search {
        display: none;
    }

    .mcd-menu li > ul {
        min-width: 180px;
        left: 70px;
    }
    .mcd-menu li:hover > ul {
        min-width: 180px;
        left: 50px;
    }
    .mcd-menu li ul li > ul,
    .mcd-menu li ul li ul li > ul {
        min-width: 150px;
    }
    .mcd-menu li ul li:hover > ul {
        left: 180px;
        min-width: 150px;
    }
    .mcd-menu li ul li ul li > ul {
        left: 35px;
        top: 45px;
        border: 0;
        border-top: 4px solid #e67e22;
    }
    .mcd-menu li ul li ul li > ul:before {
        left: 30px;
        top: -9px;
        border: 0;
        border-bottom: 5px solid #e67e22;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
    }
    .mcd-menu li ul li ul li:hover > ul {
        left: 30px;
        min-width: 150px;
        top: 35px;
    }
    .mcd-menu li ul a {
        font-size: 12px;
    }
    .mcd-menu li ul a i {
        font-size: 14px;
    }
}
</style>