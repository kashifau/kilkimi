import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost/kilkimi/backend/api.php'
});

export const fetchItems = () => api.get('/items');
export const addToCart = (item) => api.post('/cart/add', item);
export const getCart = () => api.get('/cart');

export default api;