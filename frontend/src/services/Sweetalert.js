import Swal from 'sweetalert2'
import { useRouter } from "vue-router";


export default function useAlert() {
    const router = useRouter();

    function topAlert(icon, title, position = 'top-end') {
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: icon,
            title: title
        })
    }

    function centerMessageAlert(icon, title, position = 'center') {
        Swal.fire({
            position: position,
            icon: icon,
            title: title,
            showConfirmButton: false,
            timer: 1500
        })
    }

    function centerDialogAlert(icon, text = 'Something went wrong!', title = 'Oops...', ) {
        Swal.fire({
            icon: icon,
            title: 'Oops...',
            text: text,
            confirmButtonText: 'Back',
        })
        .then((result) => {
            if (result.isConfirmed) {
                router.back()
            } else if (!result.isConfirmed) {
                router.back()
            }
        })
    }


    return { topAlert, centerMessageAlert, centerDialogAlert };
}