document.addEventListener("DOMContentLoaded", function(event) {
  document.querySelector(".upload-picture__gif").addEventListener("change", function () {
    if (this.files[0]) {
      let fr = new FileReader();
  
      fr.addEventListener("load", function () {
        document.querySelector("label").style.backgroundImage = "url(" + fr.result + ")";
      }, false);
  
      fr.readAsDataURL(this.files[0]);
    }
  });
});