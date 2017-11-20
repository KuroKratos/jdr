var account_min_length = 4;

var htmlOK  = "<span class='input-group-addon success'><i class='fa fa-check   fa' aria-hidden='true'></i></span>";
var htmlNOK = "<span class='input-group-addon danger '><i class='fa fa-remove  fa' aria-hidden='true'></i></span>";

$('#username').change(function () {

  var that = $(this);

  if(that.val().length >= account_min_length) {

  $.ajax({
    data: {
      userid: that.val()
    },
    type: "POST",
    async: false,
    url: "<?= controller_url() ?>checkUserid",
    success: function(data){

      console.log("Return : " + parseInt(data));

      if(parseInt(data) === 0) {
        that.next().remove();
        that.parent().append(htmlOK);
      } else {
        that.next().remove();
        that.parent().append(htmlNOK);
      }
    },
    error: function(e, d, l){
      console.log(e);
    }
  });

  }
  else {
    that.next().remove();
    that.parent().append(htmlNOK);
  }

});

$('.gender').click(function(){
  $('.gender').removeClass('active');
  $(this).addClass('active');
});

$('#email').change(function () {
  checkEmailValid($(this));
});

function checkEmailValid(elem) {

  var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email   = elem.val();

  if(pattern.test(email)) {
    elem.next().remove();
    elem.parent().append(htmlOK);
  }
  else {
    elem.next().remove();
    elem.parent().append(htmlNOK);
  }
}

function resetForm () {
  $('#register_form input').val('');
  $('.gender').removeClass('active');
  $('#email').next().remove();
  $('#username').focus();
}