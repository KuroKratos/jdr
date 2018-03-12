function roll (RollString = null, ReturnFormat = 'json') {
  if (RollString !== null) {
    url = "https://rolz.org/api/?"+RollString+"."+ReturnFormat;
    $.post(url, function (data) {
      console.log(data);
    }, ReturnFormat);
  }
}