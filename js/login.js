document.getElementById("login").addEventListener("click", login)

function login() {
    $.ajax({
        type: "POST",
        url: "./controller/db/login.php",
        data: {username: document.getElementById("username").value,
            password: document.getElementById("password").value},
        success: function(response) {
            console.log(response);
            if(response == "success") {
                document.location.href = "./home.php"
            } else {
                document.getElementById("wrongPass").innerHTML = response;
                document.getElementById("wrongPass").style.color = "red";
            }
        }
    })
}