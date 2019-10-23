
const username = document.getElementById('username')
const password = document.getElementById('password')
const loginButton = document.getElementById('loginButton')
loginButton.addEventListener("click",(e) => {
    e.preventDefault()
    console.log(username.value)
    
})