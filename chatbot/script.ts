document.querySelector('#chat-bot-icon')?.addEventListener('click', function() {
    const chatBot = document.querySelector('.chat-bot-container') ? document.querySelector('.chat-bot-container') as HTMLElement : null;
    if (!chatBot) return;
    if( chatBot.classList.contains('hidden')) {
        chatBot.classList.remove('hidden');
    } else {
        chatBot.classList.add('hidden');
    }
}); 