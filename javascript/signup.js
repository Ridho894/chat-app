const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input");

form.onsubmit = (e) => {
    e.preventDefault(); // Preventing form from submitting
}

continueBtn.onclick = () => {
    // Ajax Start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "../php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    xhr.send();
}