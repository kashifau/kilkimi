import React from 'react';

const ItemCard = ({ item, addToCart }) => {
  return (
    <div className="item-card">
      <h2>{item.name}</h2>
      <p>${item.price}</p>
      <button onClick={() => addToCart(item)}>Add to Cart</button>
    </div>
  );
};

export default ItemCard;