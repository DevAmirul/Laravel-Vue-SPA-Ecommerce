import axios from "axios"

document.addEventListener('alpine:init', () => {
    Alpine.data('options', () => ({
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
})