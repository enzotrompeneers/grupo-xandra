

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
              width: 300,
            },
            {
              field: "Titulo",
              title: "titulo",
              width: 100,
            },
            {
              field: "Comportamiento",
              title: "comportamiento",
              width: 130,
              sortable: false,
              textAlign: 'center',
              overflow: 'visible'
    
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
  
  $("#btn-editar").click(function(e) {
    e.preventDefault();
    $("#editar-tabble").css("display", "block");
    console.log('clicked');
  });
  
  
  
  jQuery(document).ready(function() {
    DatatableHtmlTableDemo.init();
  });
  