body {
         font-family: Arial, sans-serif;
         text-align: center;
         background-color: #f5f5f5;
         padding: 20px;
     }

     h1 {
         color: #333;
     }

     #player-container {
         max-width: 400px;
         margin: 0 auto;
         padding: 20px;
         background-color: #fff;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     }

     audio {
         width: 100%;
     }

     #playlist {
         list-style: none;
         padding: 0;
     }

     #playlist li {
         cursor: pointer;
         padding: 10px;
         background-color: #eee;
         margin: 5px 0;
         transition: background-color 0.2s ease-in-out;
     }

     #playlist li:hover {
         background-color: #ddd;
     }

     #playlist li.active {
         background-color: #007bff;
         color: #fff;
     }
     form {
    text-align: center;
    margin: 20px;
     }

     /* Style the search input */
  input[type="search"] {
    padding: 10px;
    width: 500px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
  }

  /* Style the search button */
  button.btn-primary {
    padding: 10px 20px;
    background-color: #007bff; /* Blue color for the primary button */
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin: 7px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  /* Style the button on hover */
  button.btn-primary:hover {
    background-color: #0056b3; /* Darker blue color on hover */
  }