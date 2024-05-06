/**
 * Send a message to the server
 */
document.getElementById('send-button').addEventListener('click', () => {
    const message = document.getElementById('message').value;
    if (message) {
      axios.post('/', { message: message }).then(() => {
        document.getElementById('message').value = '';
        adjustTextAreaHeight(document.getElementById('message')); // Reset textarea height
      });
    }
  });

  /**
   * Listen for events on the channel-chat channel
   */
  Echo.channel('channel-chat').listen('MessageSent', (e) => {
    const newMessage = document.createElement('div');
    newMessage.classList.add('message', 'p-2', 'my-2', 'rounded', 'bg-blue-100', 'text-right');
    // 改行文字を<br>に置換して表示
    const messageText = e.message.replace(/\n/g, '<br>');
    newMessage.innerHTML = `<span class="text-sm text-gray-600">${new Date().toLocaleTimeString()}</span><div>${messageText}</div>`;
    const messageList = document.getElementById('message-list');
    messageList.append(newMessage);
    messageList.scrollTop = messageList.scrollHeight;
});
