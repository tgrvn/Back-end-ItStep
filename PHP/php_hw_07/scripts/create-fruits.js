document.addEventListener("DOMContentLoaded", () => {
  const createFruitForm = document.forms.createFruit;
  const nameInput = document.forms.createFruit.fruitName;
  const typeInput = document.forms.createFruit.fruitType;
  const amountInput = document.forms.createFruit.fruitAmount;
  const priceInput = document.forms.createFruit.fruitPrice;

  createFruitForm.addEventListener("submit", (e) =>
    handlerSubmitCreateFruit(e)
  );
  nameInput.addEventListener("input", (e) => handlerCreateFruitInput(e));
  typeInput.addEventListener("input", (e) => handlerCreateFruitInput(e));
  amountInput.addEventListener("input", (e) => handlerCreateFruitInput(e));
  priceInput.addEventListener("input", (e) => handlerCreateFruitInput(e));
});

const CREATE_FRUIT_URL = "./server/api/createFruit.php";

let nameFruit = null;
let type = null;
let amount = null;
let price = null;

function handlerCreateFruitInput(e) {
  const inputName = e.srcElement.name;

  switch (inputName) {
    case "fruitName":
      nameFruit = e.target.value;
      break;

    case "fruitType":
      type = e.target.value;
      break;

    case "fruitAmount":
      amount = e.target.value;
      break;

    case "fruitPrice":
      price = e.target.value;
      break;
  }
}

async function handlerSubmitCreateFruit(e) {
  e.preventDefault();

  if (nameFruit && type && amount && price) {
    const formData = new FormData();
    formData.append("name", nameFruit);
    formData.append("type", type);
    formData.append("count", amount);
    formData.append("price", price);

    const response = await api.sendData(CREATE_FRUIT_URL, formData);

    e.srcElement.fruitName.value = "";
    e.srcElement.fruitType.value = "";
    e.srcElement.fruitAmount.value = "";
    e.srcElement.fruitPrice.value = "";
  }
}
