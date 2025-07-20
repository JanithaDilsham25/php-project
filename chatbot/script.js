var _a;
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
