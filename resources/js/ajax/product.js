import AlpineInstance from "alpinejs"
import axios from "axios"

document.addEventListener('alpine:init', () => {
    Alpine.data('fetchProducts', () => ({
        options: {
            selectedDataOptions: 10,
            showDataOptions: [10, 15, 20, 25, 30, 50]
        },

        getData: (selectedDataOptions, arr) => {

            let element = document.getElementById("tbody")
            return axios.get('http://127.0.0.1:8000/api-products?dataNumber=' + selectedDataOptions)
                .then(res => {

                    const result = res.data.data
                    for (const key in result) {

                        element.innerHTML += `<td><img src="${result[key]['image']}" alt="Product Image" width="100" height="100"></td>
                        <td>${result[key]['title']}</td>
                        <td>${result[key]['sku']}</td>
                        <td>${result[key]['stock_status']}</td>
                        <td>${result[key]['qty_in_stock']}</td>
                        <td>${result[key]['sub_category']}</td>
                        <td>${result[key]['price']}</td>
                        <td>${result[key]['discount_price']}</td>
                        <td>${result[key]['offer_price']}</td>
                        <td class="d-flex p-3">
                        <button class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></i></button>
                        <button class="btn btn-danger mx-1"><i class="bi bi-archive"></i></button>
                        </td>`
                    }

                })
                .catch(err => {
                    return null;
                })
        },
    }))

    Alpine.data('fetchSubCategories', () => ({

        value: {
            selectedSectionValue: 0,
            selectedCategoryValue: 0,

        },

        open: false,


        getSections: () => {
            return axios.get('http://127.0.0.1:8000/api-sections')
                .then(res => {
                    return Object.entries(res.data)
                })
                .catch(err => {
                    return null;
                })
        },

        getCategory: (sectionId) => {
            if (sectionId !== 0) {
                return axios.get('http://127.0.0.1:8000/api-Categories?sectionId=' + sectionId)
                    .then(res => {
                        // console.log(Object.entries(res.data));
                        console.log('ko');
                        return Object.entries(res.data)
                    })
                    .catch(err => {
                        return null;
                    })
            }
        },

        getSubCategory: () => {
            return axios.get('http://127.0.0.1:8000/api-sections')
                .then(res => {

                    const result = res.data
                    let arr = []
                    for (const key in result) {
                        arr.push(key, result[key]['name'])
                    }
                    return arr
                })
                .catch(err => {
                    return null;
                })
        }

    }))


    Alpine.store('state', () => ({
        options: 'ok'


    }))
})