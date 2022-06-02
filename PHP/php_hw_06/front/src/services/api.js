export function getData(URL) {
  return fetch(URL).then((response) => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error(response.status, "Data is'nt ok");
    }
  });
}
