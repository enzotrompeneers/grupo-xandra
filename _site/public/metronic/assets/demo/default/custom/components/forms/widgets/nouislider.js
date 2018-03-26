//== Class definition
var noUiSliderDemos = function() {

    var dormitoris = function() {
        if (document.getElementById("dormitorios")) {

            var sliderDormitorios = document.getElementById('dormitorios');

            noUiSlider.create(sliderDormitorios, {
                start: [ 0 ],
                step: 1,
                range: {
                    'min': [ 0 ],
                    'max': [ 12 ]
                },
                format: wNumb({
                    decimals: 0 
                })
            });

            var sliderInputDormitorios = document.getElementById('dormitorios_input');

            sliderDormitorios.noUiSlider.on('update', function( values, handle ) {
                sliderInputDormitorios.value = values[handle];
            });

            sliderInputDormitorios.addEventListener('change', function(){
                sliderDormitorios.noUiSlider.set(this.value);
            });
        }
    }

    var banos = function() {
        if (document.getElementById('banos')) {
            var sliderBanos = document.getElementById('banos');

            noUiSlider.create(sliderBanos, {
                start: [ 0 ],
                step: 1,
                range: {
                    'min': [ 0 ],
                    'max': [ 12 ]
                },
                format: wNumb({
                    decimals: 0 
                })
            });

            var sliderInputBanos = document.getElementById('banos_input');

            sliderBanos.noUiSlider.on('update', function( values, handle ) {
                sliderInputBanos.value = values[handle];
            });

            sliderInputBanos.addEventListener('change', function(){
                sliderBanos.noUiSlider.set(this.value);
            });
        }
    }

    var aeropuerto = function() {
        if (document.getElementById('aeropuerto')) {

            var sliderAeropuerto = document.getElementById('aeropuerto');

            noUiSlider.create(sliderAeropuerto, {
                start: [ 0 ],
                connect: [true, false],
                step: 1,
                range: {
                    'min': [ 0 ],
                    'max': [ 1000 ]
                },
                format: wNumb({
                    decimals: 3,
                    thousand: '.',
                })
            });

            var sliderInputAeropuerto = document.getElementById('aeropuerto_input');

            sliderAeropuerto.noUiSlider.on('update', function( values, handle ) {
                sliderInputAeropuerto.value = values[handle];
            });

            sliderInputAeropuerto.addEventListener('change', function(){
                sliderAeropuerto.noUiSlider.set(this.value);
            });
        }
    }

    var playa = function() {
        if (document.getElementById('playa')) {

            var sliderPlaya = document.getElementById('playa');

            noUiSlider.create(sliderPlaya, {
                start: [ 0 ],
                connect: [true, false],
                step: 5,
                range: {
                    'min': [ 0 ],
                    'max': [ 1000 ]
                },
                format: wNumb({
                    decimals: 3,
                    thousand: '.',
                })
            });

            var sliderInputPlaya = document.getElementById('playa_input');

            sliderPlaya.noUiSlider.on('update', function( values, handle ) {
                sliderInputPlaya.value = values[handle];
            });

            sliderInputPlaya.addEventListener('change', function(){
                sliderPlaya.noUiSlider.set(this.value);
            });
        }
    }

    var ciudad = function() {
        var sliderCiudad = document.getElementById('ciudad');
        if (document.getElementById('ciudad')) {

            noUiSlider.create(sliderCiudad, {
                start: [ 0 ],
                connect: [true, false],
                step: 5,
                range: {
                    'min': [ 0 ],
                    'max': [ 1000 ]
                },
                format: wNumb({
                    decimals: 3,
                    thousand: '.',
                })
            });

            var sliderInputCiudad = document.getElementById('ciudad_input');

            sliderCiudad.noUiSlider.on('update', function( values, handle ) {
                sliderInputCiudad.value = values[handle];
            });

            sliderInputCiudad.addEventListener('change', function(){
                sliderCiudad.noUiSlider.set(this.value);
            });
        }  
    }

    var golf = function() {
        var sliderGolf = document.getElementById('golf');
        if (document.getElementById('golf')) {

            noUiSlider.create(sliderGolf, {
                start: [ 0 ],
                connect: [true, false],
                step: 5,
                range: {
                    'min': [ 0 ],
                    'max': [ 1000 ]
                },
                format: wNumb({
                    decimals: 3,
                    thousand: '.',
                })
            });

            var sliderInputGolf = document.getElementById('golf_input');

            sliderGolf.noUiSlider.on('update', function( values, handle ) {
                sliderInputGolf.value = values[handle];
            });

            sliderInputGolf.addEventListener('change', function(){
                sliderGolf.noUiSlider.set(this.value);
            });
        }
    }

    return {
        // public functions
        init: function() {
            dormitoris();  
            banos();
            aeropuerto();
            playa();
            ciudad();
            golf();
        }
    };
}();

jQuery(document).ready(function() {
    noUiSliderDemos.init();
});



































