
export default function useToken() {

    // Store auth_token in local store or session store.
    function setToken(value, remember) {
        if (remember) localStorage.setItem('auth_token', value)
        else sessionStorage.setItem('auth_token', value)
    }

    // Get auth_token from local store or session store.
    function getToken() {
        if (sessionStorage.getItem('auth_token') !== null) return sessionStorage.getItem('auth_token');
        else if (localStorage.getItem('auth_token') !== null) return localStorage.getItem('auth_token');
        else return null;
    }

    // Delete auth_token from local store or session store.
    function deleteToken() {
        if (sessionStorage.getItem('auth_token') !== null) sessionStorage.removeItem('auth_token');
        else if (localStorage.getItem('auth_token') !== null) localStorage.removeItem('auth_token');
    }

    return { setToken, getToken, deleteToken };
}