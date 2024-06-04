import React, { useState, useEffect } from 'react';
import { getCart } from '../services/api';
import Cart from '../components/Cart.jsx';

const CartPage = () => {
  const [cart, setCart] = useState([]);

  useEffect(() => {
    fetch('/api/cart')
      .then(res => res.json())
      .then(data => {
        setCart(data.items);
      })
      .catch(err => {
        console.error('Error fetching cart:', err);
      });
  }, []);

  return (
    <div>
      <h1>Cart</h1>
      <Cart cart={cart} />
    </div>
  );
};

export default CartPage;