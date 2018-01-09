<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="js/dropzone.js"></script>

<?php /* include "dropzoneTemplate.php"  */ ?>
<script>
    
Dropzone.options.dropzone = {
  parallelUploads: 1,
  acceptedFiles: "image/jpeg,image/png,image/gif",
  maxFiles: <?= $dzMaxFiles ?>,
  maxFilesize: 2, // MB
//  previewTemplate: document.getElementById('dz-template').innerHTML,
  init: function() {
      myDropzone = this;
      this.on("addedfile1", function(file) {
          // Create the remove button
          var removeButton = Dropzone.createElement("<button>Supprimer l&apos;image</button>");
          

          // Capture the Dropzone instance as closure.
          var _this = this;

          // Listen to the click event
          removeButton.addEventListener("click", function(e) {
              // Make sure the button click doesn't submit the form:
              e.preventDefault();
              e.stopPropagation();

              // Remove the file preview.
              _this.removeFile(file);
              // If you want to the delete the file on the server as well,
              // you can do the AJAX request here.
          });

          // Add the button to the file preview element.
          file.previewElement.appendChild(removeButton);
      });
  }
};

$(function () {
    var size = myDropzone.thumbnailWidth;
    if (!size) size = 140;
    
<?php foreach ($images as $image): ?>
// Create the mock file:
    var mockFile = { name: "<?= $image ?>", size: 1234 };
// Call the default addedfile event handler
    myDropzone.emit("addedfile", mockFile);
// And optionally show the thumbnail of the file:
    myDropzone.emit("thumbnail", mockFile, "<?= dzGetThumbnail ($image) ?>" + "&box=" + size);

// Or if the file on your server is not yet in the right
// size, you can let Dropzone download and resize it
// callback and crossOrigin are optional.
// myDropzone.createThumbnailFromUrl(file, imageUrl, callback, crossOrigin);

// Make sure that there is no progress bar, etc...
    myDropzone.emit("complete", mockFile);
<?php endforeach; ?>

// If you use the maxFiles option, make sure you adjust it to the
// correct amount:
    var existingFileCount = <?= count($images) ?>; // The number of files already uploaded
    myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
});
    
</script>
