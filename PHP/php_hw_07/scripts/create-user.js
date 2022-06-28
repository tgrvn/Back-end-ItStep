document.addEventListener("DOMContentLoaded", () => {
  const createUserForm = document.forms.createUser;
  const userLogin = document.forms.createUser.login;
  const userPassword = document.forms.createUser.password;
  const userRePassword = document.forms.createUser.rePassword;
  const error = document.querySelector(".error-active");

  createUserForm.addEventListener("submit", (e) => handlerCreateUser(e));

  userLogin.addEventListener("input", (e) => handlerCreateUserInput(e, error));
  userPassword.addEventListener("input", (e) =>
    handlerCreateUserInput(e, error)
  );
  userRePassword.addEventListener("input", (e) =>
    handlerCreateUserInput(e, error)
  );
});

const CREATE_USER_URL = "./server/api/createUser.php";

let userLoginCreated = null;
let userPasswordCreated = null;
let userRePasswordCreated = null;

function handlerCreateUserInput(e, error) {
  const inputName = e.srcElement.name;

  switch (inputName) {
    case "login":
      userLoginCreated = e.target.value;
      break;

    case "password":
      userPasswordCreated = e.target.value;
      break;

    case "rePassword":
      userRePasswordCreated = e.target.value;
      break;

    default:
      break;
  }

  if (!isEmptyStr(userPasswordCreated) && !isEmptyStr(userRePasswordCreated)) {
    if (!isSame(userPasswordCreated, userRePasswordCreated)) {
      error.textContent = "*passwords not same";
    } else {
      error.textContent = "";
    }
  }
}

async function handlerCreateUser(e) {
  e.preventDefault();

  if (
    isSame(userPasswordCreated, userRePasswordCreated) &&
    !isEmptyStr(userLoginCreated)
  ) {
    const formData = new FormData();

    formData.append("userName", userLoginCreated);
    formData.append("password", userRePasswordCreated);

    const response = await api.sendData(CREATE_USER_URL, formData);
    console.log(response);

    e.target.login.value = "";
    e.target.password.value = "";
    e.target.rePassword.value = "";
  }
}

function isSame(pass, rePass) {
  if (pass === rePass) {
    return true;
  }

  return false;
}

function isEmptyStr(str) {
  if (str == "") {
    return true;
  }

  return false;
}
