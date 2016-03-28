var table = [];

function updateAlertListCallback(master) {
  return function(data) {
    var styles =
    {
      'Clear':    'text-decoration: line-through; opacity: 0.7;',
      'Raise':    '',
      undefined:  ''
    };
    for (key in data)
    {
      var value = data[key];
      //{"name":"Voltage Alarm","repeater":206901,"network":2062,"date":"2016-02-14 21:31:40","time":1455485500,"stamp":1455485500000}
      if (value['data'] == undefined)
        value['data'] = "";
      
      var _alert = {};
      _alert[php_lang['Alerts']['Time']] = value['date'];
      _alert[php_lang['Alerts']['Repeater']] = CountryImage(getCountry(value['repeater'])) + " " + value['repeater'];
      _alert[php_lang['Alerts']['Alarm']] = '<span style="' + styles[value['type']] + '">'+value['name']+'</span>';
      _alert[php_lang['Alerts']['Data']] = value['data'];
      _alert[php_lang['Alerts']['Master']] = CountryImage(getCountry(value['network'])) + " " + value['network'];
    
      table.unshift(_alert);
    }
    document.getElementById("json").innerHTML = ConvertJsonToTable(table, 'jsonTable', "table table-striped table-bordered bootstrap-datatable datatable", 'Bla');
    $('#jsonTable').dataTable({
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
        "sPaginationType": "bootstrap",
        "language": php_lang['Table']['DataTables'],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, php_lang['Table']['All']] ],
        "order": [[ 0, "desc" ]]
    } );
  }
}


$.getJSON('http://tracker.dstar.su/api/alerts.php?callback=?', updateAlertListCallback());

