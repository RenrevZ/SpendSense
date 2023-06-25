import axios from 'axios';
import Cookies from 'js-cookie'

const apiClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    withCredentials: true,
});


apiClient.interceptors.request.use((config) => {
    const token = Cookies.get('token');

    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
        config.headers.Accept = 'application/json';
    }
    return config;
});

const login = (credentials) => apiClient.post('/Login/user', credentials)

const get = (url) => apiClient.get(url)

const post =(url,items) => apiClient.post(url,items)

const put =(url,items) => apiClient.put(url,items)

export {login,get,post,put}
