function ChangeForm() {
    //var elements = document.getElementsByClassName('forminput');
    let elements = document.querySelectorAll('#form-inputs input');

    for (let i = 0; i < elements.length; i++) {
        elements[i].removeAttribute('readonly');
    }
}
    //Verandert de naam op de button nadat er op geklikt is.
    //document.getElementById("wijzig").value = "Opslaan";



