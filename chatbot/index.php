<?php
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Connection</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    </head>

    <body class="min-h-[2000px]">
        <button class="flex fixed bottom-10 right-5 z-20 shadow-md" id="chat-bot-icon"><img src="chat-bot.png" class="w-[60px]" alt="Chat Bot"></button>
        <div id="chat-bot" class=" fixed bottom-20 right-2 z-10 w-[350px] h-[450px] rounded-lg">
            <div class="chat-bot-container hidden w-full p-2 h-full bg-gray-800 text-white flex flex-col rounded-lg">
                <div class="text-center chat-header text-green-400 text-2xl font-bold border-b-2 border-green-500 p-2">
                    <h2 class="my-2">Chat Bot</h2>
                </div>
                <div class="chat-body p-4 overflow-y-auto flex-1">
                    <div id="mydiv">
                        <p>Hello! How can I assist you today?</p>
                    </div>
                </div>
                <div class="chat-footer absolute bottom-2 border-t-2 border-green-400 bg-gray-700 w-[95%] p-2 mx-auto flex items-center justify-between">
                    <input type="text" placeholder="Type your message..." class=" p-2 w-full md:w-[80%] rounded-lg bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button><img src="send.png" alt="send" class="w-[35px]"/></button>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>
</html>