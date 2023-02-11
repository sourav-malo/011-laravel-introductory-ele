$(window).on("load", function () {
  $.each($(".about-us-multi-images-delete-btn"), function (idx, el) {
    el = $(el);
    el.on("click", function () {
      el.closest("form")
        .append(
          `<input type="hidden" name="about_us_delete_multi_image" value="${idx}"/>`
        )
        .submit();
    });
  });

  $.each($(".about_us_edit_multi_image"), function (idx, el) {
    el = $(el);
    el.on("change", function () {
      el.closest("form").submit();
    });
  });
});
