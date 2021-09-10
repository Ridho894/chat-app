const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); // Preventing form from submitting
}

sendBtn.onclick = () => {
    // Ajax Start
    let xhr = new XMLHttpRequest(); // Creating XML OBJECT
    xhr.open("POST", "../php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; // Once message inserted into database then leave blank the input field
            }
        }
    }
    // Send form data through ajax to php
    let formData = new FormData(form); // Creating new formData OBJECT
    xhr.send(formData); // Sending the form data to php
}

setInterval(() => {
    // Ajax Start
    let xhr = new XMLHttpRequest(); // Creating XML OBJECT
    xhr.open("POST", "../php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }

    // Send form data through ajax to php
    let formData = new FormData(form); // Creating new formData OBJECT
    xhr.send(formData); // Sending the form data to php
}, 500) // Function will run frequently after 500ms