function diceRoll (RollString = null, ReturnFormat = 'json') {
  var ret;
  if (RollString !== null) {
    console.log(encodeURIComponent(RollString));
    url = "https://j-boisson.fr/jdr/rest/getRoll/"+encodeURIComponent(RollString)+"."+ReturnFormat;

    $.ajax({
      datatype: ReturnFormat,
      async: false,
      url: url,
      success: function(data){
        ret = data;
      },
      error: function(e, d, l){
        console.log(e);
      }
    });

    return ret;
  }
}

function appendRollToTable (RollData, TableId) {
  var ResultLine, ResultClass = "";

  if(RollData.input == "1d100") {
    ResultClass = percentileClass(RollData.result);
  }

  ResultLine  = "<tr>";
  ResultLine += "<td style='text-align:left;'>" + datetime(RollData.timestamp) + "</td>";
  ResultLine += "<td style='text-align:center;'>" + RollData.illustration + "</td>";
  ResultLine += "<td style='text-align:center;'>" + RollData.details + "</td>";
  ResultLine += "<td style='text-align:right;' class='"+ResultClass+"'>" + RollData.result + "</td>";
  ResultLine += "</tr>";
  $('#'+TableId).append(ResultLine);

  $('#'+TableId+"_wrapper").scrollTop($('#'+TableId+"_wrapper")[0].scrollHeight);
}

function percentileClass (RollResult) {
  if (RollResult <= 5) {
    return "warning text-warning";
  }
  else if (RollResult >= 96) {
    return "danger text-danger";
  }
}

function datetime (unix_timestamp) {
  // Create a new JavaScript Date object based on the timestamp
  // multiplied by 1000 so that the argument is in milliseconds, not seconds.
  var date = new Date(unix_timestamp*1000);
  // Hours part from the timestamp
  var hours = date.getHours();
  // Minutes part from the timestamp
  var minutes = "0" + date.getMinutes();
  // Seconds part from the timestamp
  var seconds = "0" + date.getSeconds();

  // Will display time in 10:30:23 format
  var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

  return formattedTime;
}