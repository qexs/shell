// server.js
const express = require('express');
const { exec } = require('child_process');
const app = express();
const PORT = 3000;

// Middleware to parse JSON data
app.use(express.json());

// Endpoint to execute commands
app.post('/execute', (req, res) => {
    const command = req.body.command;

    // Execute the command
    exec(command, (error, stdout, stderr) => {
        if (error) {
            return res.json({ output: stderr });
        }
        res.json({ output: stdout });
    });
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
