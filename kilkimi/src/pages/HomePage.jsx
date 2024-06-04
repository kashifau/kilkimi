import React, { useState, useEffect } from 'react';
import { fetchItems, addToCart } from '../services/api';
import ItemCard from '../components/ItemCard.jsx';
import { Link } from 'react-router-dom';

const HomePage = () => {
  const [items, setItems] = useState([]);

  useEffect(() => {
    fetchItems().then(response => {
      console.log('Fetched items:', response.data);
      setItems(response.data);
    }).catch(error => {
      console.error('Error fetching items:', error);
    });
  }, []);

  const handleAddToCart = async (item) => {
    try {
      const response = await addToCart(item);
      if (response.status === 200) {
        alert('Item added to cart successfully!');
      } else {
        alert('Failed to add item to cart.');
      }
    } catch (error) {
      console.error('Error adding item to cart:', error);
      alert('Error adding item to cart.');
    }
  };

  return (
    <div className="home-page">
      <h1>Kilkimi Whiskies</h1>
      <div className="items-list">
        {items.map(item => (
          <ItemCard key={item.sku} item={item} addToCart={handleAddToCart} />
        ))}
      </div>
      <Link to="/cart">Go to Cart</Link>
    </div>
  );
};

export default HomePage;