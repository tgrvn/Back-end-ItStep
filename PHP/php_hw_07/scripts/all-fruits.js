document.addEventListener("DOMContentLoaded", () => {
  const ALL_FRUITS_URL = "./server/api/getAllFruits.php";

  api.getData(ALL_FRUITS_URL, getAllFruits);

  function getAllFruits(data) {
    const allFruits = data;

    if (allFruits.length != 0) {
      allFruits.map((fruit) => {
        new Card(fruit, 0);
      });
    }
  }
});
