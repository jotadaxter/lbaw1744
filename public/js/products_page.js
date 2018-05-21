$(document).ready(function () {
    /*var grid, dialog;
    var data = JSON.parse(document.getElementById('products_json').value);

    data = [
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'Dropbox',
            'O.S.': '<img src="/windows_logo.png" width="30">',
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">' },
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'Abode Reader',
            'O.S.': '<img src="/windows_logo.png" width="30"> <img src="/ios_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'Windows',
            'O.S.': '<img src="/windows_logo.png" width="30"> <img src="/linux_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30"> <img src="/star_full.png" width="30"> <img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'Linux',
            'O.S.': '<img src="/windows_logo.png" width="30"> <img src="/linux_logo.png" width="30"> <img src="/ios_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'Ubunto',
            'O.S.': '<img src="/linux_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30"> <img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'IOS',
            'O.S.': '<img src="/windows_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'IOS',
            'O.S.': '<img src="/windows_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'},
		
        { 'Logo': '<img src="/product.png" width="30">', 'Name': 'IOS',
            'O.S.': '<img src="/windows_logo.png" width="30">' ,
            'Rate': '<img src="/star_full.png" width="30"> <img src="/star_full.png" width="30">'}
    ];

    console.log(data);

    grid = $('#grid').grid({
        dataSource: data,
        uiLibrary: 'bootstrap',
        columns: [
            { field: 'logo_path', width: 60, title: 'Logo' },
            { field: 'name', sortable: true },
            { field: 'price', title: 'Price' },
            { field: 'description', title: 'Description' },
            { field: 'release_date', title: 'Release Date' },
            { field: 'operating_system', title: 'O.S.'},
        ],
        pager: { limit: 7 }
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
    });*/
});