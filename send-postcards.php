<?php
$target_dir = "generated/";
$image = $_FILES["chosenimage"]["name"];
$image_tmp = $_FILES["chosenimage"]["tmp_name"];
$target_file = $target_dir . basename($image);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$to_email = $_POST["email"];
$sender = $_POST["sender"];

if(isset($_POST["submit"])) {
  $checkimage = getimagesize($_FILES["chosenimage"]["tmp_name"]);
  if($checkimage !== false) {
    echo "File is an image ";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
  if (move_uploaded_file($image_tmp, $target_file)) {
    echo "Image uploaded successfully";
  } else {
    echo "Error uploading image";
    exit;
  }

  // Check if message is not empty
  if (empty ( $_POST['message'])){
    echo "Please enter a message";
    exit;
  
    } else {
  $message = $_POST["message"];
 

  // Generate the postcard HTML
 $html = "<html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 16px;
                        color: #333;
                        text-align: center;
                        font-size: 1.4rem;
                        background-image: url(\"watercolor-arte.jpg\");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
                    }
                    .message {
                        margin: 20px 0;
                        font-size: 1.4rem;
                    }
                    img {
                        max-width: 600px;
                        height: auto;
                        border-radius: 10px;
                        box-shadow: 0px 6px 10px grey;
                    }
                </style>
            </head>
            <body>
                <img src='$image'>
                <div class='message'>$message</div>
            </body>
        </html>";

  // Save the postcard HTML to a file
  $filename = time() . ".html";
  file_put_contents($target_dir . $filename, $html);

  // Send the email with a link to the postcard page
  $subject = "Hai ricevuto una Cartolina Virtuale da $sender";
  $body = "Fai click sul link per vedere la tua cartolina: http://testsite.vivacitydesign.ga/postcards/$target_dir$filename";
  $headers = "From: info@vivacitydesign.ga";

  if (mail($to_email, $subject, $body, $headers)) {
    echo "Cartolina virtuale inviata!";
  } else {
    echo "Errore nell' invio.";
  }
  }
}

?>
