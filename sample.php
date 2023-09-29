<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h1>Image Upload</h1>

    <?php
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Check if an image file and user ID were uploaded
        if (!empty($_FILES['image']['name']) && !empty($_POST['user_id'])) {
            // Set the URL of the Flask application
            $url = 'http://127.0.0.1:5000/predict';

            // Get the image file and user ID from the form data
            $image = $_FILES['image']['tmp_name'];
            $user_id = $_POST['user_id'];

            // Generate a new filename with the user ID and a random number
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = $user_id . '_' . uniqid() . '.' . $extension;

            // Specify the destination directory to upload the file
            $upload_directory = 'uploads/';

            // Check if the destination directory exists, create it if not
            if (!is_dir($upload_directory)) {
                mkdir($upload_directory, 0755, true);
            }

            // Get the absolute path of the upload directory
            $absolute_path = realpath($upload_directory);

            // Generate the absolute destination path for the uploaded file
            $destination = $absolute_path . '/' . $filename;

            // Move the uploaded file to the specified destination
            if (move_uploaded_file($image, $destination)) {
                // Create a CURLFile object from the uploaded file
                $file = new CURLFile($destination, $_FILES['image']['type'], basename($destination));

                // Set the POST data
                $data = array(
                    'file' => $file,
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
                    // Decode the JSON response
                    $result = json_decode($response, true);

                    // Check if the prediction was successful
                    if (isset($result['class_name'])) {
                        // Retrieve the predicted class name and confidence score
                        $class_name = $result['class_name'];
                        $confidence_score = $result['confidence_score'];

                        // Display the prediction result
                        echo "<h2>Prediction Result:</h2>";
                        echo "Class Name: " . $class_name . "<br>";
                        echo "Confidence Score: " . $confidence_score;
                    } else {
                        // Display the error message
                        echo "<h2>Error:</h2>";
                        echo $result['message'];
                    }
                } else {
                    // Display the CURL error
                    echo "<h2>Error:</h2>";
                    echo "CURL Error: " . curl_error($curl);
                }

                // Close the CURL session
                curl_close($curl);
            } else {
                // Display an error message if the file upload fails
                echo "<h2>Error:</h2>";
                echo "Failed to upload the file.";
            }
        } else {
            // Display an error message if the required fields are not provided
            echo "<h2>Error:</h2>";
            echo "Please select an image file and enter your user ID.";
        }
    }
?>



    <form method="POST" enctype="multipart/form-data">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required><br><br>

        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
