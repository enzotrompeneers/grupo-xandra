

var DatatableHtmlTableDemo = function() {
  var paginas = function() {
    if (document.getElementsByClassName('paginas-table')[0]) {

      var datatable = $('.paginas-table').mDatatable({
        data: {
          saveState: {cookie: false},
          /* import json file to fill the database
          type: 'remote',
          source: {
            read: {
              url: 'http://server.com/table.php'
            }
          },
          */ 
        },
        search: {
          input: $('#generalSearch'),
        },
        columns: [
          {
            field: "Id",
            title: "id",
            width: 30,
            textAlign: 'center',
          },
          {
            field: "Dominio",
            title: "dominio",
            width: 100,
          },
          {
            field: "Titulo",
            title: "titulo",
            width: 100,
          },
          {
            field: "Url",
            title: "url",
            width: 100,
          },
          {
            field: "Comportamiento",
            title: "comportamiento",
            width: 130,
            sortable: false,
            textAlign: 'center',
            overflow: 'visible',
            template: function () {
              return '\
                <a href="webadmin/en/" id="btn-editar" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">\
                  <i class="la la-edit"></i>\
                </a>\
                <a href="" id="m_sweetalert_demo_8" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Borrar">\
                  <i class="la la-trash"></i>\
                </a>\
              ';
            }
          }
        ],
      });
    };
  }

  return {
    init: function() {
      paginas();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});


