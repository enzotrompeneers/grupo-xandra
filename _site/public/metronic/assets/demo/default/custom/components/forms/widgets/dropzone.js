//== Class definition



var DropzoneDemo = function () {    
    
    
    //== Private functions
    var demos = function () {
        
        // single file upload
        Dropzone.options.mDropzoneOne = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };

        // multiple file upload for documents with validation
        Dropzone.options.mDropzoneTwo = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: ".pdf,.rtf,.doc,.docx,.dotx,.dot,.htm,.odt,.ppt", // no .txt because allows .php
        };

        // multiple file upload for images with validation
        Dropzone.options.mDropzoneThree = {
            init: function() {
                this.on("addedfile", function(file) { 
                    var self = this;
                    window.loadImage.parseMetaData(file, function (data) {
                        // use embedded thumbnail if exists.
                        if (data.exif) {
                            var thumbnail = data.exif.get('Thumbnail');
                            var orientation = data.exif.get('Orientation');
                            if (thumbnail && orientation) {
                                window.loadImage(thumbnail, function (img) {
                                    self.emit('thumbnail', file, img.toDataURL());
                                }, { orientation: orientation });
                                return;
                            }
                        }
                        // use default implementation for PNG, etc.
                        self.createThumbnail(file);
                    }); 
                });
              },
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            
            
            acceptedFiles: "image/*,application/pdf,.psd",
        };
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

DropzoneDemo.init();