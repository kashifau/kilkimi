import axios from 'axios';
axios.defaults.withCredentials = true;
const api = axios.create({
  baseURL: 'http://localhost/kilkimi/backend/api.php'
});

export const fetchItems = () => {
  return api.get('/items');
};

export const addToCart = (item) => {
  return api.post('/cart/add', item);
};

export const getCart = () => {
  return api.get('/cart');
};

export default api;