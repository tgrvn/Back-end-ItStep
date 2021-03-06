class Api {
  // getData(url, calback) {
  //   return fetch(url)
  //     .then((data) => {
  //       if (data.ok) {
  //         return data.json();
  //       }
  //     })
  //     .then(calback)
  //     .catch((er) => {
  //       console.log(er);
  //     });
  // }

  async getData(url) {
    try {
      const request = await fetch(url);
      const response = await request.json();
      return response;
    } catch (error) {
      console.log(error);
    }
  }

  async sendData(url, data) {
    try {
      const request = await fetch(url, {
        method: "POST",
        body: data,
      });
      const response = await request.json();
      return response;
    } catch (error) {
      console.log(error);
    }
  }
}

const api = new Api();
