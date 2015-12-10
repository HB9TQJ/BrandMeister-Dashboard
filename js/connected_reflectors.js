var device = [];
var reflectors = [];
var t;

function updateRepeaterNames()
{
  var country_cnt = {
    'dongle': {},
    'repeater': {},
    'homebrew': {}
  };
  for (var number in servers) {
    var location = 'http://' + servers[number] + '/status/';
    $.getJSON(location + 'list.php?callback=?',{format:'json'})
      .done(function(data)
      {
        for (key in data)
        {
          var value = data[key];
          device[value['number']] = {'name': '','ref': ''};
          device[value['number']]['name'] = CountryImage(getCountry(value['number']))+" " + value['name'];
          device[value['number']]['country'] = getCountry(value['number']);
        }
        t = setTimeout(updateReflectors, 100)
      }
   ); 
  }
}

function updateReflectors() {
  clearTimeout(t);
  console.log("updateReflectors");
  var table = [];
  for (var number in servers) {
    var location = 'http://' + servers[number] + '/status/';
    $.getJSON(location + 'status.php?callback=?',
      function(data)
      {
        for (index in data) {
          var value = data[index];
          if (device[value['number']]) {
            device[value['number']]['ref'] = value['values'][19];
            if (device[value['number']]['ref'] > 0 && (params['search']==undefined || params['search']==device[value['number']]['country']))
              table.push({'Name':device[value['number']]['name'],'Reflector':device[value['number']]['ref']});
          }
        }
        document.getElementById("json").innerHTML = ConvertJsonToTable(table, 'jsonTable', "table table-striped table-bordered bootstrap-datatable datatable", 'Bla');
        $('#jsonTable').dataTable({
          "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
          "sPaginationType": "bootstrap",
          "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
          },
          "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
        });
      }
    );
  }
}

function getCountry(number)
{
  var value = String(number).substring(0,3);
  if (countries.hasOwnProperty(value))
    return countries[value];
}
function CountryImage(country){
  if (country != null)
    return '<img src="images/flags/png/' + country + '.png" \>';
  else
    return '';
}

var params = function() {
    function urldecode(str) {
        return decodeURIComponent((str+'').replace(/\+/g, '%20'));
    }

    function transformToAssocArray( prmstr ) {
        var params = {};
        var prmarr = prmstr.split("&");
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = urldecode(tmparr[1]);
        }
        return params;
    }

    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}();

updateRepeaterNames();
setInterval(updateRepeaterNames, 100000);

