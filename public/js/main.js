"use strict";

const modal = document.querySelectorAll(".modal");
const modalUpdatePost = document.getElementById('modal-update-post');
const postTitle = modalUpdatePost.querySelector('input');
const postContent = modalUpdatePost.querySelector('.form-input textarea');

// Get the value of query string values using respective "keys"
const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

let post = document.getElementById('question-' + params.id);

// Funtion for toggling the visibility of modals
function toggleModal(modalName) {
    let modalAction;

    // Remove active class
    modal.forEach((item) => {
        item.classList.remove("is-active");
    })

    if (modalName != "close") {
        modalAction = document.getElementById(`modal-${modalName}`);
        modalAction.classList.add("is-active");
    }

    if (modalUpdatePost.classList.contains('is-active')) {
        let post = document.getElementById('question-' + params.id);
       
        postTitle.value = post.querySelector('.question-content-title h3').innerHTML;
        postContent.innerHTML = post.querySelector('.question-content-body p').innerHTML;
    }
}

// Automatically resize the textarea input box height
function auto_grow(item) {
    item.style.height = (item.scrollHeight) + "px";
}

const searchHistory = document.querySelector(".recent-list");
const recentStatus = document.getElementById('recent-status');
const clearSearchBtn = document.forms['searchForm']['clearBtn'];


// Function for outputing search history
function addSearch() {
    const inputSearch = document.forms['searchForm']['searchInput'];

    // Check if inputSearch is empty
    if (inputSearch.value == "") {
        return
    }

    clearSearchBtn.classList.remove('is-hidden');
    recentStatus.classList.add('is-hidden');

    // Create recent-search-item, and insert the inputSearch value
    const newSearch = `
        <li></i><a href="#" class="recent-item">${inputSearch.value}</a></li>
    `;

    // Output the search
    searchHistory.innerHTML += newSearch;

    // Clear the inputSearch field
    inputSearch.value = "";

    return searchHistory;
}

function clearSearchHistory() {
    searchHistory.innerHTML = "";
    recentStatus.classList.remove('is-hidden');
    clearSearchBtn.classList.add('is-hidden');
}