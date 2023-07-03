import axios from "axios"

document.addEventListener('alpine:init', () => {
    Alpine.data('options', () => ({
        options: {
            selectedDataOptions: 10,
            showDataOptions: [10, 15, 20, 25, 30, 50]
        },
        showData: {
            ok: [1, 2]
        },
        getData: (selectedDataOptions) => {
            let element = document.getElementById("tr1")
            return axios.get('http://127.0.0.1:8000/api-products?dataNumber=' + selectedDataOptions)
                .then(res => {
                    const result = res.data.data
                    console.log(result);
                    for (const key in result) {
                        console.log(result[key]['title'] );
                        element.innerHTML = "<td>"+result[key]['title']+"</td>"
                    }
                    // console.log(result[key]);

                })
                .catch(err => {
                    return null;
                })

        },
    }))
})