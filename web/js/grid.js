$(document).ready(function() {
  $('a.nav').live('click', function() {
    if($(this).hasClass('disabled'))
    {
      return false;
    }
    
    $('div#grid').load($(this).attr('href'));
    return false;
  });
});

$(document).keypress(function(e) {
  switch(e.keyCode) {
    case 37:
      $('.left').trigger('click');
      break;
    case 38:
      $('.up').trigger('click');
      break;
    case 39:
      $('.right').trigger('click');
      break;
    case 40:
      $('.down').trigger('click');
      break;
  }
});