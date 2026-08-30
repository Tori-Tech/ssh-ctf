<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title> DNS Lookup Utility </title>

</head>

<body style="font-family: Arial, sans-serif; margin: 40px;">


<h2> Network Diagnostic Tool </h2>
<p> Enter a domain name to test resolving its IP address via <code> nslookup </code>. </p>

<form method="POST" action="">
    <label for="domain"> Domain Target: </label><br>
    <input type="text" id="domain" name="domain" placeholder="example.com" style="width: 300px; padding:5px; margin-top: 5px;"><br><br>
    <input type="submit" name="submit" value="Run Lookup" style="padding: 5px 15px;">
    </form>

    <hr>

<h3>Results:</h3>
    <pre style="background: #f4f4f4; padding: 15px; border: 1px solid #ccc; min-height: 50px;">



<?php
if (isset($_POST['submit']) && !empty($_POST['domain'])) {
    
    // raw input grabbed directly from the HTTP Request without sanitization
    $target = $_POST['domain'];

    // user input concatenated to system terminal command
    $command = "nslookup " . $target;

    //passes the unsanitized string directly to the host OS shell
    $output = shell_exec($command);

    // renders the command output back to the page
    if ($output) {
        echo htmlspecialchars($output);
    } else {
        echo "No output or execution failed.";
    }
}
?>

</pre>

</body>
</html>

