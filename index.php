

<html lang="en">
<head>

<style>
.postcard-form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f8f8f8;
    border-radius: 5px;
}

.postcard-form label {
    display: block;
    margin-bottom: 5px;
}

.postcard-form input[type="file"],
.postcard-form textarea,
.postcard-form input[type="email"],
.postcard-form input[type="text"]{
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.postcard-form input[type="submit"] {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>
</head>

<body>

<form action="send-postcards.php" method="post" class="postcard-form" enctype="multipart/form-data">
  <label for="image">Carica una immagine:</label>
  <input type="file" name="chosenimage" id="image">
  <br>
  <label for="message">Inserisci un messaggio:</label>
  <textarea name="message" id="message"></textarea>
  <br>
    <label for="sender">Inserisci il tuo nome:</label>
  <input type="text" name="sender" id="sender">
  <br>
  <label for="email">Enter your email address:</label>
  <input type="email" name="email" id="email">
  <br>
   <input type="submit" value="Upload Image" name="submit">
</form>


<!-- Change to jour .js directory ... -->
<script src="js/scripts.js"></script>

</body>
</html>