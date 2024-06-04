import React from 'react';

const Cart = ({ cart }) => {
  if (!cart) {
    return <div>Loading...</div>; // Handle null or undefined cart
  }

  const totalPrice = cart.reduce((sum, item) => {
    const price = parseFloat(item.price);
    return sum + (isNaN(price) ? 0 : price); // Only add if price is a number.
  }, 0);

  return (
    <div className="cart">
      <h2>Shopping Cart</h2>
      <ul>
        {cart.map((item, index) => (
          <li key={index}>{item.name} - ${parseFloat(item.price).toFixed(2)}</li>
        ))}
      </ul>
      <h3>Total: ${totalPrice.toFixed(2)}</h3>
    </div>
  );
};

export default Cart;