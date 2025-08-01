const url = "http://localhost/logiciel/";
function insert(receiver, direction, formData) {
  $.ajax({
    url: url + receiver,
    type: "post",
    data: formData,
    contentType: false,
    processData: false
  })
    .done(function (res) {
      if (res.status === "success") {
        alert("ok");
        window.location.href=url+direction;
        Swal.fire("Subscribed!", "Your file has been deleted.", "success");
      }
    })
    .fail(function () {
      alert("something went wrong");
    });
}
