window.onload = function(){
  $('#profile_pic').on('change', function(e){
    const fileReader = new FileReader();
    fileReader.onload = function(e) {
      $('.profile-pic').attr('src', e.target.result);
    }
    fileReader.readAsDataURL(e.target.files[0]);
  });
}