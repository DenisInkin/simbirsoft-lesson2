function updateChat() {
    var nickName = document.getElementById('usr').value;
    var message = document.getElementById('msg').value;
    var date = new Date().toLocaleString();

    var textArea = document.getElementById('chat');

    textArea.value += date + ' ' + nickName + '> ' + message + '\n';
    textArea.scrollTop = textArea.scrollHeight;
}

function sendForm(event) {
    event.preventDefault();
    updateChat();
}