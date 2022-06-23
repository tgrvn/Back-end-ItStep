document.addEventListener("DOMContentLoaded", () => {
  const allFruits = document.querySelectorAll(".all-fruits")[1];
  const randomFruitsFrom = document.forms.random;
  const randomInput = document.querySelector("input[name=random]");
  const error = document.querySelector(".random-error");

  randomFruitsFrom.addEventListener("submit", (e) =>
    handlerSubmitRandom(e, allFruits)
  );

  randomInput.addEventListener("input", (e) => handlerRandomInput(e, error));
});

const RANDOM_FRUIT_URL = "./server/api/getRandomFruit.php";

let randomAmount = null;

async function handlerSubmitRandom(e, allFruits) {
  e.preventDefault();
  allFruits.innerHTML = "";
  randomAmount =
    randomAmount === null || randomAmount === undefined ? 1 : randomAmount;

  const formData = new FormData();
  formData.append("count", randomAmount);

  const randomFruits = await api.sendData(RANDOM_FRUIT_URL, formData);

  getRandomFruit(randomFruits);
}

function handlerRandomInput(e, error) {
  randomAmount = e.target.value;

  if (randomAmount > 30) {
    error.classList.add("error-active");
    e.target.value = 30;
  } else {
    error.classList.remove("error-active");
  }
}

function getRandomFruit(data) {
  const randomFruit = data;

  if (randomFruit) {
    randomFruit.map((fruit) => {
      new Card(fruit, 1);
    });
  }
}

api.getData(RANDOM_FRUIT_URL, getRandomFruit);
