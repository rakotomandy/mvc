
function selectImg(id) {
  let photo = document.querySelector(id);
  photo.addEventListener("change", function (event) {
    let file = event.target.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function () {
        let result = reader.result;
        document.querySelector(
          ".photoContent"
        ).innerHTML = `<img src= "${result}"
                                                alt = "" width="200" height="200">
                                                    `;
      };
      reader.readAsDataURL(file);
    }
  });
}
