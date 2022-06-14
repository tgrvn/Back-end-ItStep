document.addEventListener("DOMContentLoaded", () => {
  const RANDOM_FRUIT_URL =
    "http://localhost/git/Back-end-ItStep/PHP/php_hw_07/server/api/getRandomFruit.php";

  api.getData(RANDOM_FRUIT_URL, getRandomFruit);

  const randomFruitsFrom = document.forms.random;
  const randomInput = document.querySelector("input[name=random]");
  const error = document.querySelector(".random-error");

  let randomAmount = null;

  randomFruitsFrom.addEventListener("submit", (e) => {
    e.preventDefault();
  });

  randomInput.addEventListener("input", (e) => {
    randomAmount = e.target.value;

    if (randomAmount > 30) {
      error.classList.add("error-active");
    } else {
      
    }
  });

  function getRandomFruit(data) {
    const randomFruit = data;

    if (randomFruit) {
      randomFruit.map((fruit) => {
        new Card(fruit, 1);
      });
    }
  }
});
