$(document).ready(function() {
  $.fn.follow = function() {
      const $self = this;
      let isFollowing = false;
      let mouseX, mouseY;

      $(document).on('mousemove', function(e) {
          mouseX = e.pageX;
          mouseY = e.pageY;
          if(isFollowing) {
              $self.offset({
                  left: mouseX,
                  top: mouseY
              });
          }
      });

      $self.on('mouseenter', function(e) {
          isFollowing = true;
      });

      $self.on('mousedown', function(e) {
          isFollowing = false;
      });

      return this;
  };


  $('.elem').follow();
  $('.elem1').follow();
  $('.desc').follow();
  $('.get-yii').follow();
  $('.desc1').follow();
  $('.doc').follow();
  $('.head1').follow();
  $('.desc2').follow();
  $('.forum').follow();
  $('.head2').follow();
  $('.desc3').follow();
  $('.ext').follow();
});