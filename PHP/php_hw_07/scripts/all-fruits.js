document.addEventListener("DOMContentLoaded", () => {
  const ALL_FRUITS_URL = "./server/api/getAllFruits.php";

  async function getAllFruits() {
    const allFruits = await api.getData(ALL_FRUITS_URL);

    if (allFruits.length != 0) {
      allFruits.map((fruit) => {
        new Card(fruit, 0);
      });
    }
  }

  getAllFruits();
});
