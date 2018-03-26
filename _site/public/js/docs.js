
var config = new Vue({
    
    el: '#docs',
    
    data: {
        
        base_site: $('base').attr('href'),
        docblocks: null,
        displayClass: null,
        displayProperty: null,
        displayMethod: null,
        submenu: null
        
    },

    delimiters: ['((','))'],
    
    computed: {
      

        
    },
     
    methods: {
        
      getData(){

          var vm = this;
          
          axios.get('es/api/docblocks/')
          .then(function (response) {

                vm.docblocks = response.data;

            });

      },

      showThisClass(className){
        
        this.displayClass = className;
        this.displayMethod = null;

      },

      showThisMethod(method){
        
        this.displayMethod = method;

      },

      showThisProperty(property){
        
        this.displayProperty = property;

      },

      setSubmenu(namespace){

        this.submenu = namespace;

      }
      
    },
    
    mounted: function() {

        this.getData();
      
    },
    
    watch: {
        
  
        
    }
    
});