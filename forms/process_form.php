<?php
/**
 * Configuration
 * Change these values to match your email and form setup.
 */
$receiving_email_address = 'info@disruptivecollectiveltd.com'; // Change this to your actual receiving email address!
$subject_prefix = 'bg@gmail.com';

/**
 * Initialize variables for feedback
 */
$response = [];

/**
 * Check if the form was submitted via POST
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. --- Input Sanitization and Validation ---

    // Define the required fields and collect inputs
    $required_fields = ['name', 'email', 'subject', 'message'];
    $errors = [];
    $data = [];

    // Sanitize and validate
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . " is required.";
        } else {
            // Basic sanitization
            $data[$field] = trim(stripslashes(htmlspecialchars($_POST[$field])));
        }
    }

    // Additional email validation
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // 2. --- Email Sending Logic ---

    if (empty($errors)) {
        
        $to = $receiving_email_address;
        $subject = $subject_prefix . $data['subject'];
        
        // Construct the email body
        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Name: " . $data['name'] . "\n";
        $email_body .= "Email: " . $data['email'] . "\n";
        $email_body .= "Subject: " . $data['subject'] . "\n\n";
        $email_body .= "Message:\n" . $data['message'] . "\n";

        // Set email headers
        $headers = "From: " . $data['name'] . " <" . $data['email'] . ">\r\n";
        $headers .= "Reply-To: " . $data['email'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Attempt to send the email
        if (mail($to, $subject, $email_body, $headers)) {
            $response['status'] = 'success';
            $response['message'] = 'Thank you! Your message has been sent successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'There was an error sending your message. Please try again later.';
            // For debugging, you might log the error here.
        }

    } else {
        // Validation errors occurred
        $response['status'] = 'error';
        $response['message'] = 'Please correct the following errors: ' . implode(' ', $errors);
    }

} else {
    // Not a POST request (direct access)
    $response['status'] = 'error';
    $response['message'] = 'Access denied: Form must be submitted.';
}

/**
 * 3. --- Output Feedback ---
 * This block redirects the user back to the contact page 
 * with a success/error message in the URL, or you can 
 * use it to output JSON for an AJAX submission.
 */

// If you are using traditional form submission, redirect back:
if (isset($response['status'])) {
    $redirect_url = 'contact.html?status=' . $response['status'] . '&message=' . urlencode($response['message']) . '#contact-form-section';
    header("Location: " . $redirect_url);
    exit();
}

// If you are using AJAX, you would output JSON instead:
/*
header('Content-Type: application/json');
echo json_encode($response);
exit();
*/
?>