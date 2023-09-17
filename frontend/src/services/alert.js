import Swal from 'sweetalert2'
import { useRouter } from "vue-router";


const router = useRouter();
export default function useAlert() {

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
            confirmButtonText: 'Ok',
        })
    }
    return { topAlert, centerMessageAlert, centerDialogAlert };
}