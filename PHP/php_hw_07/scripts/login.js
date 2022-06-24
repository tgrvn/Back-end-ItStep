document.addEventListener("DOMContentLoaded", () => {
  const loginFrom = document.forms.login;
  const login = loginFrom.login;
  const password = loginFrom.password;

  loginFrom.addEventListener("submit", (e) => handlerSubmitLogin(e));

  login.addEventListener("input", (e) => handlerLoginInput(e));
  password.addEventListener("input", (e) => handlerLoginInput(e));
});

const LOGIN_URL = "./server/api/login.php";
let userLogin = null;
let userPassword = null;

async function handlerSubmitLogin(e) {
  e.preventDefault();
  
  const formData = new FormData();
  formData.append("login", userLogin);
  formData.append("password", userPassword);

  const response = await api.sendData(LOGIN_URL, formData);

  if (response === "admin") {
    window.location.href = "admin.php";
  } else if (response === "user") {
    window.location.href = "user.php";
  } else if (response === "error") {
    console.log("user not found");
  }

  e.srcElement.login.value = "";
  e.srcElement.password.value = "";
}

function handlerLoginInput(e) {
  const inputName = e.srcElement.name;

  switch (inputName) {
    case "login":
      userLogin = e.target.value;
      break;

    case "password":
      userPassword = e.target.value;
      break;
  }
}
