function togglePopup(id) {
    popup = document.getElementById(id);
    popup.classList.toggle("open");
}

function menuDropdown(id) {
    dropdown = document.getElementById(id);

    dropdown.classList.toggle("open");
}



window.addEventListener("load", function(){

    document.getElementById("open_popup_natation").addEventListener("click", function(){togglePopup("popup_content_natation");});
    document.getElementById("open_popup_athletisme").addEventListener("click", function(){togglePopup("popup_content_athletisme");});
    document.getElementById("open_popup_aviron").addEventListener("click", function(){togglePopup("popup_content_aviron");});

    document.getElementById("popup_exit_natation").addEventListener("click", function(){togglePopup("popup_content_natation");});
    document.getElementById("popup_exit_athletisme").addEventListener("click", function(){togglePopup("popup_content_athletisme");});
    document.getElementById("popup_exit_aviron").addEventListener("click", function(){togglePopup("popup_content_aviron");});


    document.getElementById("bouton_dropdown").addEventListener("click", function(){menuDropdown("menu_dropdown");});


});