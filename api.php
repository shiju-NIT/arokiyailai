<?php
// Set the URL of the Flask application
$url = 'http://127.0.0.1:5000/';

//$url = 'http://cotton.tntradition.in/';

// Check if an image file and user ID were uploaded
if (!empty($_FILES['image']['name']) && !empty($_POST['user_id'])) {
    // Get the image file and user ID from the form data
    $image = $_FILES['image']['tmp_name'];
    $user_id = $_POST['user_id'];

        // Get the original filename and extension
        $filename = basename($_FILES['image']['name']);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
        // Generate a new filename with the user ID and timestamp
        // $new_filename = $user_id . '_' . $filename ;


// Generate a new filename with the user ID and a random number
$new_filename = $user_id . '_' . mt_rand(1000, 9999) . '.' . $extension;
   


    


    // Create a CURLFile object from the image file
    $file = new CURLFile($image, $_FILES['image']['type'], $new_filename);


    

    // Set the POST data
    $data = array(
        'image' => $file,
        'user_id' => $user_id
    );

    // Initialize a CURL session
    $curl = curl_init();

    // Set the CURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Send the POST request to the Flask application
    $response = curl_exec($curl);

    // Check if the request was successful
    if ($response !== false) {


                // Move the uploaded file to a new location with the new filename
                $moved = move_uploaded_file($image, 'uploads/user_images/' . $new_filename);

        // Decode the JSON response
        $result = json_decode($response, true);

        // Set a session variable with the result message
        $_SESSION['message'] = $result['prediction'];

        // Redirect to the results page
        header('Location: results.php');
        exit();
    } else {
        // Display an error message if the request failed
        $_SESSION['message'] = 'Error: ' . curl_error($curl);

        // Redirect to the results page
        header('Location: results.php');
        exit();
    }

    // Close the CURL session
    curl_close($curl);
} else {
    // Set a session variable with the error message
    $_SESSION['message'] = 'Error: Please select an image and enter your user ID.';

    // Redirect to the results page
    header('Location: results.php');
    exit();
}
?>
