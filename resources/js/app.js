Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add('dz-success','dz-complete');
        }

        this.on("success", function(file, response) {
            console.log(response.imagen);
            document.querySelector('[name="imagen"]').value = response.imagen;
        });

        this.on("success", function(file, response) {
            console.log("Archivo subido exitosamente");
        });

        this.on("error", function(file, errorMessage) {
            console.error("Error al subir el archivo:", errorMessage);
        });
    }
});


