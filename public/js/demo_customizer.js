// Demo Customizer
$(function(){

  $('.floated-customizer-btn').on('click', function(){
    $('.floated-customizer-panel').toggleClass('active');
    return false;
  });


  function os_init_customizer(){
    // MENU LAYOUT
    if($('.menu-w').hasClass('menu-layout-compact')){
      $('.menu-layout-selector').val('compact');
    }
    if($('.menu-w').hasClass('menu-layout-full')){
      $('.menu-layout-selector').val('full');
    }
    if($('.menu-w').hasClass('menu-layout-mini')){
      $('.menu-layout-selector').val('mini');
    }
    // MENU COLOR
    if($('.menu-w').hasClass('color-scheme-dark') && $('.menu-w').hasClass('color-style-bright')){
      $('.menu-color-selector').removeClass('selected');
      $('.menu-color-selector.color-bright').addClass('selected');
    }
    if($('.menu-w').hasClass('color-scheme-dark') && $('.menu-w').hasClass('color-style-dark')){
      $('.menu-color-selector').removeClass('selected');
      $('.menu-color-selector.color-dark').addClass('selected');
    }
    if($('.menu-w').hasClass('color-scheme-light')){
      $('.menu-color-selector').removeClass('selected');
      $('.menu-color-selector.color-light').addClass('selected');
    }
    if($('.menu-w').hasClass('color-style-transparent')){
      $('.menu-color-selector').removeClass('selected');
      $('.menu-color-selector.color-transparent').addClass('selected');
    }
    // MENU POSITION
    if($('.menu-w').hasClass('menu-position-side') && $('.menu-w').hasClass('menu-side-left')){
      $('.menu-position-selector').val('left');
    }
    if($('.menu-w').hasClass('menu-with-image')){
      $('.with-image-selector').val('yes');
    }else{
      $('.with-image-selector').val('no');
    }
    if($('.menu-w').hasClass('menu-position-top')){
      $('.menu-position-selector').val('top');
      $('.with-image-selector-w').show();
    }else{
      $('.with-image-selector-w').hide();
    }
    if($('.menu-w').hasClass('menu-position-side') && $('.menu-w').hasClass('menu-side-right')){
      $('.menu-position-selector').val('right');
    }

    // SUB MENU

    if($('.menu-w').hasClass('sub-menu-color-bright')){
      $('.sub-menu-color-selector').removeClass('selected');
      $('.sub-menu-color-selector.color-bright').addClass('selected');
    }
    if($('.menu-w').hasClass('sub-menu-color-dark')){
      $('.sub-menu-color-selector').removeClass('selected');
      $('.sub-menu-color-selector.color-dark').addClass('selected');
    }
    if($('.menu-w').hasClass('sub-menu-color-light')){
      $('.sub-menu-color-selector').removeClass('selected');
      $('.sub-menu-color-selector.color-light').addClass('selected');
    }

    // SUB MENU STYLE
    if($('.menu-w').hasClass('sub-menu-style-flyout')){
      $('.sub-menu-style-selector').val('flyout');
    }
    if($('.menu-w').hasClass('sub-menu-style-inside')){
      $('.sub-menu-style-selector').val('inside');
    }
    if($('.menu-w').hasClass('sub-menu-style-over')){
      $('.sub-menu-style-selector').val('over');
    }

    // TOP BAR

    if($('.top-bar').hasClass('color-scheme-bright')){
      $('.top-bar-color-selector').removeClass('selected');
      $('.top-bar-color-selector.color-bright').addClass('selected');
    }
    if($('.top-bar').hasClass('color-scheme-dark')){
      $('.top-bar-color-selector').removeClass('selected');
      $('.top-bar-color-selector.color-dark').addClass('selected');
    }
    if($('.top-bar').hasClass('color-scheme-light')){
      $('.top-bar-color-selector').removeClass('selected');
      $('.top-bar-color-selector.color-light').addClass('selected');
    }
    if($('.top-bar').hasClass('color-scheme-transparent')){
      $('.top-bar-color-selector').removeClass('selected');
      $('.top-bar-color-selector.color-transparent').addClass('selected');
    }

    // FULL SCREEN
    if($('body').hasClass('full-screen')){
      $('.full-screen-selector').val('yes');
    }else{
      $('.full-screen-selector').val('no');
    }

    // SHOW/HIDE TOP BAR
    if($('.top-bar').hasClass('d-none')){
      $('.top-bar-visibility-selector').val('no');
    }else{
      $('.top-bar-visibility-selector').val('yes');
    }

    // TOP BAR ABOVE MENU?
    if($('.content-w .top-bar').length){
      $('.top-bar-above-menu-selector').val('no');
    }else{
      $('.top-bar-above-menu-selector').val('yes');
    }

  }

  function os_apply_customizations(){
    // MENU STYLE
    var menu_color_scheme = 'light';
    var menu_color_style = 'default';
    if($('.menu-color-selector.selected').hasClass('color-bright')){
      menu_color_scheme = 'dark';
      menu_color_style = 'bright';
    }
    if($('.menu-color-selector.selected').hasClass('color-dark')){
      menu_color_scheme = 'dark';
      menu_color_style = 'default';
    }
    if($('.menu-color-selector.selected').hasClass('color-light')){
      menu_color_scheme = 'light';
      menu_color_style = 'default';
    }
    if($('.menu-color-selector.selected').hasClass('color-transparent')){
      if($('body').hasClass('color-scheme-dark'))
        menu_color_scheme = 'dark';
      else
        menu_color_scheme = 'light';
      menu_color_style = 'transparent';
    }
    $('.menu-w').removeClass(function (index, className) {
        return (className.match (/(^|\s)color-scheme-\S+/g) || []).join(' ');
    });
    $('.menu-w').removeClass(function (index, className) {
        return (className.match (/(^|\s)color-style-\S+/g) || []).join(' ');
    });
    $('.menu-w').addClass('color-scheme-' + menu_color_scheme).addClass('color-style-' + menu_color_style);


    // TOP BAR STYLE
    var top_bar_color_scheme = 'light';
    if($('.top-bar-color-selector.selected').hasClass('color-bright')){
      top_bar_color_scheme = 'bright';
    }
    if($('.top-bar-color-selector.selected').hasClass('color-dark')){
      top_bar_color_scheme = 'dark';
    }
    if($('.top-bar-color-selector.selected').hasClass('color-light')){
      top_bar_color_scheme = 'light';
    }
    if($('.top-bar-color-selector.selected').hasClass('color-transparent')){
      top_bar_color_scheme = 'transparent';
    }
    $('.top-bar').removeClass(function (index, className) {
        return (className.match (/(^|\s)color-scheme-\S+/g) || []).join(' ');
    });
    $('.top-bar').addClass('color-scheme-' + top_bar_color_scheme);



    // SUB MENU STYLE
    var sub_menu_color_scheme = 'light';
    if($('.sub-menu-color-selector.selected').hasClass('color-bright')){
      sub_menu_color_scheme = 'bright';
    }
    if($('.sub-menu-color-selector.selected').hasClass('color-dark')){
      sub_menu_color_scheme = 'dark';
    }
    if($('.sub-menu-color-selector.selected').hasClass('color-light')){
      sub_menu_color_scheme = 'light';
    }
    $('.menu-w').removeClass(function (index, className) {
      return (className.match (/(^|\s)sub-menu-color-\S+/g) || []).join(' ');
    });
    $('.menu-w').addClass('sub-menu-color-' + sub_menu_color_scheme);



    // Menu Position
    var menu_position = $('.menu-position-selector').val();
    $('.menu-w').removeClass(function (index, className) {
      return (className.match (/(^|\s)menu-position-\S+/g) || []).join(' ');
    });
    $('.menu-w').removeClass(function (index, className) {
      return (className.match (/(^|\s)menu-side-\S+/g) || []).join(' ');
    });
    $('body').removeClass('menu-position-top').removeClass('menu-position-side').removeClass('menu-side-left').removeClass('menu-side-right');
    if(menu_position == 'top'){
      $('.menu-w').addClass('menu-position-top');
      $('body').addClass('menu-position-top');
      $('.with-image-selector-w').slideDown();
    }else{
      $('.with-image-selector-w').hide();
    }
    if(menu_position == 'left'){
      $('.menu-w').addClass('menu-position-side').addClass('menu-side-left');
      $('body').addClass('menu-position-side').addClass('menu-side-left');
      $('.menu-w .os-dropdown-position-left').removeClass('os-dropdown-position-left').addClass('os-dropdown-position-right');
    }
    if(menu_position == 'right'){
      $('.menu-w').addClass('menu-position-side').addClass('menu-side-right');
      $('body').addClass('menu-position-side').addClass('menu-side-right');
      $('.menu-w .os-dropdown-position-right').removeClass('os-dropdown-position-right').addClass('os-dropdown-position-left');
    }


    // Menu Layout
    var menu_layout = $('.menu-layout-selector').val();
    $('.menu-w').removeClass(function (index, className) {
      return (className.match (/(^|\s)menu-layout-\S+/g) || []).join(' ');
    });
    $('.menu-w').addClass('menu-layout-' + menu_layout);
    if(menu_layout == 'full'){
      $('.menu-w > .logged-user-w').removeClass('avatar-inline');
    }else{
      $('.menu-w > .logged-user-w').addClass('avatar-inline');
    }
    if(menu_layout == 'mini'){
      $('.sub-menu-style-selector option[value="inside"]').attr("disabled","disabled");
      if(menu_position == 'left'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-right-center');
      }
      if(menu_position == 'right'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-left-center');
      }
      if(menu_position == 'top'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-left');
      }
    }else{
      $('.sub-menu-style-selector option[value="inside"]').removeAttr("disabled","disabled");
      if(menu_position == 'left'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-right');
      }
      if(menu_position == 'right'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-left');
      }
      if(menu_position == 'top'){
        $('.menu-actions .os-dropdown-trigger').removeClass(function (index, className) { return (className.match (/(^|\s)os-dropdown-position-\S+/g) || []).join(' '); });
        $('.menu-actions .os-dropdown-trigger').addClass('os-dropdown-position-left');
      }
    }

    // Sub Menu Style
    var sub_menu_style = $('.sub-menu-style-selector').val();
    $('.menu-w').removeClass(function (index, className) {
      return (className.match (/(^|\s)sub-menu-style-\S+/g) || []).join(' ');
    });
    $('.menu-w').addClass('sub-menu-style-' + sub_menu_style);

    // Top Bar Visibility
    if($('.top-bar-visibility-selector').val() == 'yes') 
      $('.top-bar').removeClass('d-none')
    else
      $('.top-bar').addClass('d-none')

    // Full screen selector
    if($('.full-screen-selector').val() == 'yes') 
      $('body').addClass('full-screen')
    else
      $('body').removeClass('full-screen')

    // Menu with image
    if($('.with-image-selector').val() == 'yes'){
      $('.menu-w').addClass('menu-with-image');
    }else{
      $('.menu-w').removeClass('menu-with-image');
    }
    // Top Bar Placement
    var $top_bar = $('.top-bar');
    if($('.top-bar-above-menu-selector').val() == 'yes'){
      if($('.content-w .top-bar').length){
        $top_bar = $('.content-w .top-bar');
        $('.all-wrapper').prepend($top_bar);
        $('.content-w .top-bar').remove();
      }
    }else{
      if($('.all-wrapper > .top-bar').length){
        $top_bar = $('.all-wrapper > .top-bar');
        $('.content-w').prepend($top_bar);
        $('.all-wrapper > .top-bar').remove();
      }
    }
    // MENU CLICK/HOVER DECISION
    if(($('.sub-menu-style-selector').val() == 'inside') && $('.menu-position-selector').val() != 'top' && $('.menu-w.menu-activated-on-hover').length){
      $('.menu-activated-on-hover').off('mouseenter', 'ul.main-menu > li.has-sub-menu');
      $('.menu-activated-on-hover').off('mouseleave', 'ul.main-menu > li.has-sub-menu');
      $('.menu-w').removeClass('menu-activated-on-hover').addClass('menu-activated-on-click');
      $('.sub-menu-color-selector.color-light').click();
      os_init_sub_menus();
    }else{
      if($('.menu-w.menu-activated-on-click').length && (($('.sub-menu-style-selector').val() != 'inside') || ($('.menu-position-selector').val() == 'top'))){
        $('.menu-activated-on-click').off('click', 'li.has-sub-menu > a');
        $('.menu-w').addClass('menu-activated-on-hover').removeClass('menu-activated-on-click');
        os_init_sub_menus();
      }
    }
  }




  os_init_customizer();
  $('.floated-customizer-panel .color-selector').on('click', function(){
    $(this).closest('.fcp-colors').find('.color-selector.selected').removeClass('selected');
    $(this).addClass('selected');
    os_apply_customizations();
  });
  $('.floated-customizer-panel select').on('change', function(){
    os_apply_customizations();
  });
  $('.menu-layout-selector').on('change', function(){
    if($(this).val() == 'mini'){
      $('.sub-menu-style-selector').val('over');
    }
    os_apply_customizations();
  });
  $('.close-customizer-btn').on('click', function(){
    $('.floated-customizer-panel').toggleClass('active');
    return false;
  });
  $('.with-image-selector').on('change', function(){
    if($(this).val() == 'yes'){
      $('.color-selector.menu-color-selector.color-bright').click();
    }
  });

});