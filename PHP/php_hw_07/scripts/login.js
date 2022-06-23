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
  const formData = new FormData();
  formData.append("login", userLogin);
  formData.append("password", userPassword);

  const response = await api.sendData(LOGIN_URL, formData);
  console.log("response >", response);

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
