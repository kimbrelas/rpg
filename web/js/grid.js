$(document).ready(function() {
  $('.nav').live('click', function() {
    $('div#grid').load($(this).attr('url'));
    return false;
  });
});