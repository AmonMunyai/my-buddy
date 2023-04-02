"use strict";

// Funtion for toggling the visibility of modals
function toggleModal(modalName) {
    let modalAction;
    const modal = document.querySelectorAll(".modal");

    // Remove 
    modal.forEach((item) => {
        item.classList.remove("is-active");
    })

    if (modalName != "close") {
        modalAction = document.getElementById(`modal-${modalName}`);
        modalAction.classList.add("is-active");
    }
}

const tagList = document.querySelector(".tags");
const input = document.getElementById("tag-input");

// Function for outputing the tags
function addTag() {
    // Check if input is empty
    if (input.value == "") {
        return
    }

    // Remove whitespace
    input.value = input.value.replace(/\s/g, '');

    // Limit the amount of tags to 5
    if (tagList.children.length >= 4) {
        // Disable input
        input.disabled = true;

        // Change placeholder text
        input.placeholder = "Max number of tags reached!";
    }

    // Create tag element, and insert the input value
    const newTag = `
        <li class="tag">${input.value}<i class="fa fa-close remove-tag-btn"></i></li>
    `;

    // Output the tag
    tagList.innerHTML += newTag;

    // Clear the input field
    input.value = "";

    return tagList;
}

// Add a click event to the dynamically created 'remove-tag-btn' elements
window.addEventListener('click', element => {
    if (element.target.classList.contains('remove-tag-btn')) {
        element.target.parentElement.remove();
        // Enable input
        input.disabled = false;

        // Change placeholder text
        input.placeholder = "Add a tag";
    }
})