$(window).on('load', function(){
  $.each($('.preview-img-inp'), function(idx, el){
    $(el).on('change', function(e){
      const fileReader = new FileReader();
      fileReader.onload = function(e) {
        $('.preview-img').attr('src', e.target.result);
      }
      fileReader.readAsDataURL(e.target.files[0]);
    });
  });
});