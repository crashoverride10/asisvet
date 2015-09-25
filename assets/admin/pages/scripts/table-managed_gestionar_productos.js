var TableManaged = function () {

    var initTable1 = function () {

        var table = $('#sample_1');

        // begin first table
        table.dataTable({
            "columns": [{
                "orderable": false
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {			
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": false
            }],
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,            
            "pagingType": "bootstrap_full_number",
            "language": {
                "lengthMenu": "  _MENU_ registros",
                "paginate": {
                    "previous":"Atras",
                    "next": "Siguiente",
                    "last": "Ultimo",
                    "first": "Primero"
                }
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_1_wrapper');


        tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
    }

    

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();