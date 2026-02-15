<?php 
require "includes/header.php"; 

// Grab the form data, sanitize and store in variables
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

// Server-side validation
$errors = []; 

// Require first name
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is required."; 
}

// Require last name
if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is required."; 
}

// Require email and validate proper format
if ($email === null || $email === '') {
    $errors[] = "Email is required."; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email address."; 
}

// Require message
if ($message === null || $message === '') {
    $errors[] = "Message is required."; 
}

// If there are errors, display to user and exit the script
if (!empty($errors)) {
    echo "<main>";
    echo "<h2>Please fix the following errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul>";
    echo "<p><a href='contact_form.php'>Go Back</a></p>";
    echo "</main>";
    require "includes/footer.php";
    exit;
}

?>

<main>
    <!-- Display confirmation message -->
    <?php echo "<h2>Thanks for your message, " . $firstName . "!</h2>"; ?>

    <h3>Message Received</h3>
    <p><strong>Name:</strong> <?php echo $firstName . " " . $lastName; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Message:</strong></p>
    <p><?php echo $message; ?></p>

</main>

<!-- Send email using mail function -->
<?php 
$to = "info@bakery.com"; // Update this to the bakery's email
$subject = "New Contact Form Message from " . $firstName . " " . $lastName;

// Build email message
$emailMessage = "New Contact Form Submission\n\n";
$emailMessage .= "Name: " . $firstName . " " . $lastName . "\n";
$emailMessage .= "Email: " . $email . "\n\n";
$emailMessage .= "Message:\n" . $message . "\n";

// Email headers
$headers = "From: noreply@bakery.com\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

// Send the email
mail($to, $subject, $emailMessage, $headers);
?> 

<?php require "includes/footer.php"; ?>