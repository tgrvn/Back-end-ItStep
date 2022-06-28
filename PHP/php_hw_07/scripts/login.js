document.addEventListener("DOMContentLoaded", () => {
  const loginFrom = document.forms.login;
  const login = loginFrom.login;
  const password = loginFrom.password;
  const error = document.querySelector(".error-active");

  loginFrom.addEventListener("submit", (e) => handlerSubmitLogin(e, error));

  login.addEventListener("input", (e) => handlerLoginInput(e));
  password.addEventListener("input", (e) => handlerLoginInput(e));
});

const LOGIN_URL = "./server/api/login.php";
let userLogin = null;
let userPassword = null;

async function handlerSubmitLogin(e, error) {
  error.textContent = "";
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
    error.textContent = "*invalid user name or password";
  }
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
