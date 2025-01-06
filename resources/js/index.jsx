import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import '../css/app.css'; // Import global styles (optional)

const root = ReactDOM.createRoot(document.getElementById('app'));

root.render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
);