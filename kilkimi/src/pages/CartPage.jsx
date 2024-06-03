import React, { useState, useEffect } from 'react';
import { getCart } from '../services/api';
import Cart from '../components/Cart.jsx';

const CartPage = () => {
  const [cart, setCart] = useState([]);

  useEffect(() => {
    getCart().then(response => {
      console.log('Fetched cart:', response.data.items);
      setCart(response.data.items);
    }).catch(error => {
      console.error('Error fetching cart:', error);
    });
  }, []);

  return (
    <div className="cart-page">
      <h1>Your Cart</h1>
      <Cart cart={cart} />
    </div>
  );
};

export default CartPage;