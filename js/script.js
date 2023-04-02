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
const inputTag = document.getElementById("tag-input");

// Function for outputing the tags
function addTag() {
    // Check if inputTag is empty
    if (inputTag.value == "") {
        return
    }

    // Remove whitespace
    inputTag.value = inputTag.value.replace(/\s/g, '');

    // Change to lowercase
    inputTag.value = inputTag.value.toLowerCase();

    // Limit the amount of tags to 5
    if (tagList.children.length >= 4) {
        // Disable inputTag
        inputTag.disabled = true;

        // Change placeholder text
        inputTag.placeholder = "Max number of tags reached!";
    }

    // Create tag element, and insert the inputTag value
    const newTag = `
        <li class="tag">${inputTag.value}<i class="fa fa-close remove-tag-btn"></i></li>
    `;

    // Output the tag
    tagList.innerHTML += newTag;

    // Clear the inputTag field
    inputTag.value = "";

    return tagList;
}

// Add a click event to the dynamically created 'remove-tag-btn' elements
window.addEventListener('click', element => {
    if (element.target.classList.contains('remove-tag-btn')) {
        element.target.parentElement.remove();
        // Enable inputTag
        inputTag.disabled = false;

        // Change placeholder text
        inputTag.placeholder = "Add a tag";
    }
})

const searchHistory = document.querySelector(".recent-search-list");
const inputSearch = document.getElementById("search-input");
const recentSearchStatus = document.getElementById('recent-search-status');
const clearSearchBtn = document.getElementById('clear-search-btn');

// Function for outputing search history
function addSearch() {
    // Check if inputSearch is empty
    if (inputSearch.value == "") {
        return
    }

    clearSearchBtn.classList.remove('is-hidden');
    recentSearchStatus.classList.add('is-hidden');

    // Create recent-search-item, and insert the inputSearch value
    const newSearch = `
        <li><a href="#" class="recent-search-item">${inputSearch.value}</a></li>
    `;

    // Output the search
    searchHistory.innerHTML += newSearch;

    // Clear the inputSearch field
    inputSearch.value = "";

    return searchHistory;
}

function clearSearchHistory() {
    searchHistory.innerHTML = "";
    recentSearchStatus.classList.remove('is-hidden');
    clearSearchBtn.classList.add('is-hidden');
}