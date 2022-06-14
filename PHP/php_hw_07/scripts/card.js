class Card {
  constructor(fruit, param) {
    const cardsContainer = document.querySelectorAll(".all-fruits")[`${param}`];

    const card = document.createElement("div");
    card.classList.add("all-fruits__card");

    const fruitHead = document.createElement("h3");
    fruitHead.textContent = fruit.name;

    const fruitType = document.createElement("h4");
    fruitType.textContent = fruit.type;

    const fruitAmount = document.createElement("p");
    fruitAmount.textContent = fruit.count;

    const fruitPrice = document.createElement("p");
    fruitPrice.textContent = fruit.price;

    card.append(fruitHead, fruitType, fruitAmount, fruitPrice);
    cardsContainer.append(card);
  }
}
