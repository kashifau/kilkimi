import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost/kilkimi/backend/api.php'
});

export const fetchItems = () => api.get('/items');
export const addToCart = (item) => {
  console.log('Adding item to cart:', item);
  return api.post('/cart/add', item);
};
export const getCart = () => {
  console.log('Fetching cart from:', api.defaults.baseURL + '/cart');
  return api.get('/cart');
};

export default api;