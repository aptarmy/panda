jQuery(document).ready(function($) {

  $('#widgets-right').on('click', '.APT-AC000-tab-item', function(event) {
    event.preventDefault();
    var widget = $(this).parents('.widget');
    widget.find('.APT-AC000-tab-item').removeClass('active');
    $(this).addClass('active');
    widget.find('.APT-AC000-tab').addClass('APT-AC000-hide');
    widget.find('.' + $(this).data('toggle')).removeClass('APT-AC000-hide');
  });

});