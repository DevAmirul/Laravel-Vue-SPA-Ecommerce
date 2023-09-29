
window.addEventListener('success-toast', event => {
    iziToast.success({
        title: 'Successfully',
        message: event.detail.message,
    });
})
window.addEventListener('error-toast', event => {
    iziToast.error({
        title: 'Error',
        message: event.detail.message,
    });
})

flatpickr("#start_date", {
    dateFormat: "Y-m-d H:i:s",
    enableTime: true,
    time_24hr: true
});
flatpickr("#expire_date", {
    dateFormat: "Y-m-d H:i:s",
    enableTime: true,
    time_24hr: true
});

