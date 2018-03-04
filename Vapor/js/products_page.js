$(document).ready(function () {
  var data, grid, dialog;
  data = [
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'Dropbox', 'Tags': '<img src="res/images/product.png" width="30">', 'Rate': '2.5' },
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'Abode Reader', 'Tags': 'Rio de Janeiro, Brazil' , 'Rate': '1'},
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'Windows', 'Tags': 'Chadderton, Lancashire, England' , 'Rate': '5'},
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'Linux', 'Tags': 'Gelsenkirchen, West Germany' , 'Rate': '2'},
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'Ubunto', 'Tags': 'Cúcuta, Colombia' , 'Rate': '4'},
    { 'ID': '<img src="res/images/product.png" width="30">', 'Name': 'IOS', 'Tags': 'Blagoevgrad, Bulgaria' , 'Rate': '5'}
  ];
  grid = $('#grid').grid({
    dataSource: data,
    uiLibrary: 'bootstrap',
    columns: [
      { field: 'ID', width: 48 },
      { field: 'Name', sortable: true },
      { field: 'Tags', title: 'Tags'},
	  { field: 'Rate', title: 'Rate', sortable: true },
      { title: '', field: 'Edit', width: 34, type: 'icon', icon: 'glyphicon-pencil', tooltip: 'Edit', events: { 'click': Edit } },
                    { title: '', field: 'Delete', width: 34, type: 'icon', icon: 'glyphicon-remove', tooltip: 'Delete', events: { 'click': Delete } }
    ],
    pager: { limit: 5 }
  });
  dialog = $('#dialog').dialog({
    title: 'Add/Edit Record',
    autoOpen: false,
    resizable: false,
    modal: true
  });
  function Edit(e) {
    $('#ID').val(e.data.id);
    $('#Name').val(e.data.record.Name);
    $('#Tags').val(e.data.record.Tags);
    $('#dialog').dialog('open');
  }
  function Delete(e) {
    if (confirm('Are you sure?')) {
      grid.removeRow(e.data.id - 1);
    }
  }
  function Save() {
    if ($('#ID').val()) {
      var id = parseInt($('#ID').val());
      grid.updateRow(id, { 'ID': id, 'Name': $('#Name').val(), 'Tags': $('#Tags').val() });
    } else {
      grid.addRow({ 'ID': grid.count(true) + 1, 'Name': $('#Name').val(), 'Tags': $('#Tags').val() });
    }
    dialog.close();
  }
  $('#btnAdd').on('click', function () {
    $('#ID').val('');
    $('#Name').val('');
    $('#Tags').val('');
    $('#dialog').dialog('open');
  });
  $('#btnSave').on('click', Save);
  $('#btnCancel').on('click', function () {
    dialog.close();
  });
  $('#btnSearch').on('click', function () {
    var query, result;
    query = $('#txtQuery').val();
    result = $.grep(data, function (e) {
      return e.Name.indexOf(query) > -1 || e.Tags.indexOf(query) > -1;
    });
    grid.render(result);
  });
  $('#btnClear').on('click', function () {
    $('#txtQuery').val('');
    grid.render(data);
  });
});