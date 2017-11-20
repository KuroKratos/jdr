$(document).ready(function() {
  update_online_char_div();
  setInterval(
    function () { update_online_char_div(); },
    20000
  );
});

function update_online_char_div() {
  $.post('index.php/Ajax/getOnlineCharCount',function (result) {
    div = $("#online_players");
    console.log('result = ' + result.online);
    console.log('html   = ' + div.html());
    if(div.html() != result.online) {
      div.fadeOut(function() {
        div.html(result.online).fadeIn();
      });
    }
  }, 'json');
}

function loadPage (link, base_url) {
  var dataUrl = link.attr("href");
  if (dataUrl != "") {
    $.ajax({
      type: 'POST',
      data: { ajax: 1 },
      async: true,
      url: base_url + dataUrl,
      success: function(html){
        history.pushState(null, null, dataUrl);
        $(document).prop('title', link.attr('title'));
        $('#menu li').removeClass('active');
        link.parent().addClass('active');
        $('.site-content').html(html);
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }
}