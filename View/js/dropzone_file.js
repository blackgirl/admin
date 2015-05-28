// myDropzone is the configuration for the element that has an id attribute
// with the value my-dropzone (or myDropzone)
Dropzone.options.myDropzone = {
paramName: "file",
init: function() {
  this.on("addedfile", function(file) {
    // Create the remove button
    var removeButton = Dropzone.createElement("<span class='glyphicon glyphicon-remove'></span>");
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
    // var a = file.previewElement.find('img');
    // console.log(file.previewTemplate.children[0].childNodes[0].attributes['src'].val());
    console.log(file.previewTemplate.children[0].childNodes[0].src);
    // console.log(a);
    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);
  });
}
};