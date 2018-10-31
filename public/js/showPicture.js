$(document).ready(function() {
    $('.data-table').DataTable();
} );

var file = document.getElementById('chooseimg');
var img = document.getElementById('image');
file.addEventListener("change", function() {
    if (this.value) {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            img.src = reader.result;
        };
        reader.readAsDataURL(file);
    }
});

