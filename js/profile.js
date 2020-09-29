document.getElementById("submitInput").addEventListener("click", update)

function update() {
    $.ajax({
        type: "POST",
        url: "./controller/db/updateUser.php",
        data: {id: document.getElementById("_id").value,
            name: document.getElementById("name").value,
            surname: document.getElementById("surname").value,
            username: document.getElementById("username").value,
            oldpassword: document.getElementById("oldpassword").value,
            newpassword: document.getElementById("password").value,
            email: document.getElementById("email").value},
        success: function(response) {
            console.log(response);
            if(response == "success") {
                document.location.href = "./home.php"
            }
            else {
                document.getElementById("passmsg").innerHTML = "Old password incorrect!"
                document.getElementById("passmsg").style.color = "red";
            }
        }
    })
}