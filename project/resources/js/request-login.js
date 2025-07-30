document.getElementById("form-login").addEventListener("submit", (e) => {
    e.preventDefault();

    const form = {
        user: document.getElementById("user").value,
        password: document.getElementById("password").value,
    };

    console.log(form);
});
