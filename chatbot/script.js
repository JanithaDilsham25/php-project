var _a;
document.addEventListener("DOMContentLoaded", function () {
    var send_button = document.querySelector('#send_button');
    if (!send_button)
        return;
    // window.alert('Send button found!');
    // console.log('Send button found!');
    send_button.disabled = true;
    var chatInput = document.querySelector('.chat-footer input[type="text"]');
    chatInput === null || chatInput === void 0 ? void 0 : chatInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission
            if (chatInput && chatInput.value.trim() !== '') {
                send_button.click(); // Trigger the click event on the send button
            }
        }
        // Enable the send button when there is input
        if (chatInput && chatInput.value.trim() !== '') {
            send_button.disabled = false;
        }
        else {
            send_button.disabled = true; // Disable if input is empty
        }
    });
    send_button.addEventListener('click', function () {
        if (!chatInput)
            return;
        var userMessage = chatInput.value;
        if (!userMessage)
            return;
        // Display user message in chat body
        var chatBody = document.querySelector('.chat-body #mydiv');
        if (chatBody) {
            var userMessageElement = document.createElement('p');
            userMessageElement.className = 'p-3 bg-gray-600 my-2 rounded-l-md rounded-tr-md text-white max-w-xs break-words'; // Optional: Add a class for styling
            userMessageElement.textContent = userMessage;
            chatBody.appendChild(userMessageElement);
        }
        // Clear input field
        chatInput.value = '';
        send_button.disabled = true; // Disable the button after sending
        console.log('Send button clicked! This is where you would handle sending the message.');
    });
});
(_a = document.querySelector('#chat-bot-icon')) === null || _a === void 0 ? void 0 : _a.addEventListener('click', function () {
    var chatBot = document.querySelector('.chat-bot-container') ? document.querySelector('.chat-bot-container') : null;
    if (!chatBot)
        return;
    if (chatBot.classList.contains('hidden')) {
        chatBot.classList.remove('hidden');
    }
    else {
        chatBot.classList.add('hidden');
    }
});
