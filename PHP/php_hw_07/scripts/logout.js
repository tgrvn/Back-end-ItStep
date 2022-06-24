document.addEventListener("DOMContentLoaded", () => {
  const exitBtn = document.querySelector(".exit");

  exitBtn.addEventListener("click", (e) => handlerLogout(e));
});

const LOGOUT_URL = "./server/api/logout.php";

async function handlerLogout(e) {
  e.preventDefault();

  const response = await api.getData(LOGOUT_URL);
  window.location.href = "index.php";
}
