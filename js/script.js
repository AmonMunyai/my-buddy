"use strict";

function toggleModal(modalName) {
    // Toggles the visibility of login, sign up and forgot password popups.
    let modalAction;
    const modal = document.querySelectorAll(".modal");

    modal.forEach((item) => {
        item.classList.remove("is-active");
    })

    if (modalName != "close") {
        modalAction = document.getElementById(`modal-${modalName}`);
        modalAction.classList.add("is-active");
    }
}