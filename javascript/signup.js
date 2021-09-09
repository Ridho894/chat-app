const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); // Preventing form from submitting
}

continueBtn.onclick = () => {
    // Ajax Start
    let xhr = new XMLHttpRequest(); // Creating XML OBJECT
    xhr.open("POST", "../php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Send form data through ajax to php
    let formData = new FormData(form); // Creating new formData OBJECT
    xhr.send(formData); // Sending the form data to php
}