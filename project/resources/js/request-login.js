import axios from "axios";

document.getElementById("form-login").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = {
        user: document.getElementById("user"),
        password: document.getElementById("password"),
    };
    const alert_message = document.getElementById("alert");
    alert_message.classList.toggle("hidden");

    try {
        const response = await axios.post("/api/user/login", {
            user: form.user.value,
            password: form.password.value,
        });

        localStorage.setItem("user", JSON.stringify(response.data.user));
        window.location.href = "/home";
    } catch (error) {
        console.log(error.response.data);
        if (
            "errors" in error.response.data &&
            "user" in error.response.data.errors
        ) {
            alert_message.innerText =
                error.response.data.errors.user || "Erro ao fazer login";
            alert_message.classList.remove("hidden");
            form.user.focus();
            return;
        }

        if (
            "errors" in error.response.data &&
            "password" in error.response.data.errors &&
            !("user" in error.response.data.errors)
        ) {
            alert_message.innerText =
                error.response.data.errors.password || "Erro ao fazer login";
            alert_message.classList.remove("hidden");
            form.password.focus();
            return;
        }

        alert_message.innerText =
            error.response.data.message || "Erro ao fazer login";
        alert_message.classList.remove("hidden");
    }
});
