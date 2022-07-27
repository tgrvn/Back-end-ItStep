document.addEventListener("DOMContentLoaded", () => {
  const form = document.forms.filters;
  const checkInputs = document.querySelectorAll("input[type=checkbox]");

  checkInputs.forEach((element) => {
    const url = window.location.href;
    const checkParam = `&${element.name}`;

    if (url.includes(element.name)) {
      element.checked = true;
    }

    element.addEventListener("click", (e) => {
      if (element.checked) {
        const newURL = url + checkParam;
        location.href = newURL;
      }

      if (!!url.includes("&min")) {
        const minMaxParam = url.slice(url.indexOf("&min"));
        const newURL =
          url.slice(0, url.indexOf("&min")) + checkParam + minMaxParam;
        console.log(newURL);
        location.href = newURL;
      }

      if (url.includes(element.name)) {
        const newURL = url.replace(checkParam, "");
        location.href = newURL;
      }
    });
  });

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const url = location.href;
    const min = form.min;
    const max = form.max;

    const minParam = `&min=${min.value}`;
    const maxParam = `&max=${max.value}`;

    if (url.includes("&min")) {
      const end = url.indexOf("&min");
      const newURL = url.slice(0, end);
      location.href = newURL + minParam + maxParam;
    } else {
      location.href = url + minParam + maxParam;
    }
  });
});
