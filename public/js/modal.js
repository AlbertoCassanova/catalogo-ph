var modal = document.getElementById("myModal");
var modalDelete = document.getElementById("modalDelete");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var deleteBtn = document.getElementById('deleteBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var spanDelete = document.getElementsByClassName("closeDelete")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
}
deleteBtn.onclick = function (e) {
    let form =document.forms['eliminar_form'];
    form.id_eliminar.value = e.target.name;
    modalDelete.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}
spanDelete.onclick = function () {
    modalDelete.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    switch (event.target) {
        case modal:
            modal.style.display = "none";
            break;
        case modalDelete:
            modalDelete.style.display = "none";
            break;
        default:
            break;
    }
}
