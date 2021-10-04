$(document).ready(function () {
  $("#allselectbox").click(function (event) {
    if (this.checked) {
      $(".selectbox").each(function () {
        this.checked = true;
      });
    } else {
      $(".selectbox").each(function () {
        this.checked = false;
      });
    }
  });
});
