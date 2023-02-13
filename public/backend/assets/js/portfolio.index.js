$(window).on("load", function () {
  $(".portfolio-delete-form .btn-danger").on("click", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this portfolio!",
      icon: "warning",
      showCancelButton: !0,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success mt-2",
      cancelButtonClass: "btn btn-danger ms-2 mt-2",
      buttonsStyling: !1,
    }).then(function (t) {
      $(e.target).closest("form").submit();
    });
  });
});
