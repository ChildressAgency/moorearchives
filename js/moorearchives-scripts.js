
jQuery(document).ready(function(){

//pagination
var page = 2;
var loadMore = 'on';

  if(!$.trim($('#posts').html()).length){
    $('.load-more').addClass('disabled');
  }
  if($('.lastpage').length > 0){
    $('.load-more').addClass('disabled');
  }

  $('.load-more').on('click', function(e){
    e.preventDefault();

    if(loadMore == 'on'){
      loadMore = 'off';
      $(this).addClass('active');
      $('#posts').append($('<div id="p' + page + '" class="page">').load(
        window.location.href + '/?paged=' + page + ' .page > *',
        function(){
          if($.trim($('#p' + page + '.page').html()).length > 0){
            $('#main').addClass('alt-bg');
          }
          page++;
          loadMore = 'on';
          $('.load-more.active').removeClass('active');
        }
      ).hide().fadeIn(3000));
    }
  });
  $(document).ajaxComplete(function(event, xhr, options){
    if(xhr.responseText.indexOf('class="lastpage"') > 0){
      loadMore = 'off';
      $('.load-more.active').removeClass('active')
      $('.load-more').addClass('disabled');
    }
  });
});