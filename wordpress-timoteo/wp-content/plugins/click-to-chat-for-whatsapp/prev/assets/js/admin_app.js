// Click to Chat - prev
jQuery(document).ready(function($) {
  // wpColorPicker
  $('.color-wp').wpColorPicker();
});

// initialize materialize function .. 
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  M.FormSelect.init(elems, {});
  var elems = document.querySelectorAll('.collapsible');
  M.Collapsible.init(elems, {});
});

jQuery(document).ready(function () {

  let position = document.querySelectorAll('.position');

  let default_display = () => {
    
    let val = jQuery('.select').find(":selected").val();
    let position1 = document.querySelector('.position-1');
    let position2 = document.querySelector('.position-2');
    let position3 = document.querySelector('.position-3');
    let position4 = document.querySelector('.position-4');

    if (val == '1') {
      position1.classList.add('display-block');
    } else if (val == '2') {
      position2.classList.add('display-block');
    } else if (val == '3') {
      position3.classList.add('display-block');
    } else if (val == '4') {
      position4.classList.add('display-block');
    }

  }
  default_display();

  //  incase display-block is added remove it ..
  let remove = () => {
    position.forEach(e => {
      e.classList.remove('display-block');
    });
  }

  jQuery(".select").on("change", function (e) {
    let val = e.target.value;
    let position1 = document.querySelector('.position-1');
    let position2 = document.querySelector('.position-2');
    let position3 = document.querySelector('.position-3');
    let position4 = document.querySelector('.position-4');

    if (val == '1') {
      remove();
      position1.classList.add('display-block');
    } else if (val == '2') {
      remove();
      position2.classList.add('display-block');
    } else if (val == '3') {
      remove();
      position3.classList.add('display-block');
    } else if (val == '4') {
      remove();
      position4.classList.add('display-block');
    }

  });

});