import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: '/',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
        'Accept': 'application/json',
        'allow-origin': '*',
        'cors' : 'no-cors'
    }
});

export default axiosInstance;
