// resources/js/App.jsx
import React from "react";
import { createRoot } from 'react-dom/client'

export default function App(){
    console.log("Yo")
    return(
        <h1>Hi</h1>
    );
}

if(document.getElementById('root')){
    console.log("Yo")
    createRoot(document.getElementById('root')).render(<App />)
}
