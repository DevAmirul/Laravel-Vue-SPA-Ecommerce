
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
