
export default function useToken() {

    function setToken(value, remember) {
        if (remember) localStorage.setItem('', value)
        else sessionStorage.setItem('auth_token', value)
    }

    function getToken() {
        if (sessionStorage.getItem('auth_token') !== null) return sessionStorage.getItem('auth_token');
        else if (localStorage.getItem('auth_token') !== null) return localStorage.getItem('auth_token');
        else return null;
    }

    function deleteToken() {
        if (sessionStorage.getItem('auth_token') !== null) sessionStorage.removeItem('auth_token');
        else if (localStorage.getItem('auth_token') !== null) localStorage.removeItem('auth_token');
    }

    return { setToken, getToken, deleteToken };
}