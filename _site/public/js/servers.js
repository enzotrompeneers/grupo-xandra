
var config = new Vue({
    
    el: '#servers',
    
    data: {
        
        base_site: $('base').attr('href'),
        serverList: null,
        serverDetails: null
        
    },

    delimiters: ['((','))'],
    
    computed: {
      

        
    },
     
    methods: {
        
        getData(){

            var vm = this;
            
            axios.get('es/api/servers-list/')
            .then(function (response) {

                vm.serverList = response.data;

            });

        },

        showServer(name){

            var vm = this;
            
            axios.get('es/api/server-detail/' + name + '/')
            .then(function (response) {

                vm.serverDetails = response.data;

            });           

        }
      
    },
    
    mounted: function() {

        this.getData();
      
    },
    
    watch: {
        
  
        
    }
    
});