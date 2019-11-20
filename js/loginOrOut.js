function showLogin(loggedIn) {
    if(loggedIn == true){
            document.getElementById("login").style.visibility = "invisible";
            document.getElementById("logout").style.visibility = "visible";
    }
    else{
            document.getElementById("login").style.visibility = "visible"
            document.getElementById("logout").style.visibility = "invisible";
        }
}