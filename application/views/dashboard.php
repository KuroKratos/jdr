<style type="text/css">
  .dc_dice_a {
    color: #FF8888; 
  }
  .dc_dice_d {
    color: #00BB00; 
  }
  .dc_number {
    color: #8888FF;
  }
  .dc_operator:before,
  .dc_operator:after {
     content: "\00a0 ";
  }
</style>

<div class="well well-lg col-lg-4 pull-right" id="roll-result" style="font-weight:bold; font-size: 14px;">
<table class="table table-striped table-condensed table-hover">
  <thead>
    <th>Time</th>
    <th>Roll</th>
    <th>Detail</th>
    <th>Result</th>
  </thead>
  <tbody id='roll_result'>
  </tbody>
</table>
</div>

<script type="text/javascript">

function roll (RollString = null, ReturnFormat = 'json') {
  var ret;
  if (RollString !== null) {
    url = "https://rolz.org/api/?"+RollString+"."+ReturnFormat;
    
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

$(document).ready(function () {
  var MyRoll = {}, ResultLine;
  
  MyRoll = roll("1d8%2B2","json");
  
  ResultLine  = "<tr>";
  ResultLine += "<td>" + datetime(MyRoll.timestamp) + "</td>";
  ResultLine += "<td>" + MyRoll.illustration + "</td>";
  ResultLine += "<td>" + MyRoll.details + "</td>";
  ResultLine += "<td>" + MyRoll.result + "</td>";
  ResultLine += "</tr>";
  
  $('#roll_result').append(ResultLine);
});
</script>