// for side bar
const navToggle = document.querySelector('.nav-toggle');
const side_bar = document.querySelector('.side-bar');
const content = document.querySelector('.body-element-container');

navToggle.addEventListener('click', () => {
    side_bar.classList.toggle('side-bar-visible');
    content.classList.toggle('body-element-container-smash')
})


if (window.innerWidth < 730) {
    content.addEventListener('click', () => {
        side_bar.classList.remove('side-bar-visible');
        content.classList.remove('body-element-container-smash');
    });
}


// for side bar list
const sideBarLists = document.querySelectorAll('.side-bar-list');

sideBarLists.forEach(function(sideBarList) {
    sideBarList.addEventListener('click', function() {
        const clickedInnerList = this.querySelector('.inner-list');
        const clickedLeftAngleIcon = this.querySelector('.left-angle-icon');

        if (clickedInnerList && clickedLeftAngleIcon) { // Check if elements exist
            sideBarLists.forEach(function(otherSideBarList) {
                if (otherSideBarList !== sideBarList) {
                    const otherInnerList = otherSideBarList.querySelector('.inner-list');
                    const otherLeftAngleIcon = otherSideBarList.querySelector('.left-angle-icon');
                    if (otherInnerList && otherLeftAngleIcon && otherInnerList.classList.contains('inner-list-visible')) {
                        otherInnerList.classList.remove('inner-list-visible');
                        otherLeftAngleIcon.classList.remove('left-angle-icon-rotate');
                    }
                }
            });

            clickedInnerList.classList.toggle('inner-list-visible');
            clickedLeftAngleIcon.classList.toggle('left-angle-icon-rotate');
        }
    });
});

// notification dispaly
document.addEventListener("DOMContentLoaded", function () {
    const notification = document.querySelector(".notification");
    const notificationContent = document.querySelector(".notification-content");

    notification.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevents the click event from reaching the document

        if (notificationContent.style.display === "none" || notificationContent.style.display === "") {
            notificationContent.style.display = "block";
        } else {
            notificationContent.style.display = "none";
        }
    });

    document.addEventListener("click", function () {
        notificationContent.style.display = "none"; // Hide content if clicked anywhere else on the document
    });

    notificationContent.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevents the click event from reaching the document
    });
});

// display modal
document.addEventListener("DOMContentLoaded", function () {
    const modalbutton = document.querySelector(".modal-display");
    const modalContent = document.querySelector(".modal-content");

    modalbutton.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevents the click event from reaching the document

        if (modalContent.style.display === "none" || modalContent.style.display === "") {
            modalContent.style.display = "block";
        } else {
            modalContent.style.display = "none";
        }
    });

    document.addEventListener("click", function () {
        modalContent.style.display = "none"; // Hide content if clicked anywhere else on the document
    });

    modalContent.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevents the click event from reaching the document
    });
});

// advisor group accept or group modal
document.addEventListener("DOMContentLoaded", function () {
    const modalButtons = document.querySelectorAll(".group-modal-display");
    const modals = document.querySelectorAll(".group-modal-content");

    modalButtons.forEach(button => {
        const targetId = button.getAttribute("data-target");
        const targetModal = document.querySelector(targetId);

        button.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevents the click event from reaching the document

            // Hide other modals
            modals.forEach(modal => {
                if (modal !== targetModal) {
                    modal.style.display = "none";
                }
            });

            // Toggle the target modal
            if (targetModal.style.display === "none" || targetModal.style.display === "") {
                targetModal.style.display = "block";
            } else {
                targetModal.style.display = "none";
            }
        });
    });

    document.addEventListener("click", function () {
        // Hide all modals if clicked anywhere else on the document
        modals.forEach(modal => {
            modal.style.display = "none";
        });
    });

    modals.forEach(modal => {
        modal.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevents the click event from reaching the document
        });
    });
});



// for two button display and hide
const addCommittee = document.querySelector('.add-committee');
const modifyCommittee = document.querySelector('.modify-committee');
const addCommitteeForm = document.querySelector('.add-committee-form');
const modifyCommitteeForm = document.querySelector('.modify-committee-form');

    addCommittee.addEventListener('click', () => {
        addCommitteeForm.classList.toggle('manage-committee-form-visible');
        modifyCommitteeForm.classList.remove('manage-committee-form-visible');
        addCommittee.style.backgroundColor = "#DBD8E3";
        modifyCommittee.style.backgroundColor = "white";

    })

    modifyCommittee.addEventListener('click', () => {
        modifyCommitteeForm.classList.toggle('manage-committee-form-visible');
        addCommitteeForm.classList.remove('manage-committee-form-visible');
        modifyCommittee.style.backgroundColor = "#DBD8E3";
        addCommittee.style.backgroundColor = "white";
    })

    // notification dispaly
    document.addEventListener('DOMContentLoaded', function() {
        var notification = document.querySelector('.notification');
        var notificationContent = document.querySelector('.notification-content');
    
        notification.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent the click event from propagating to the document
            notificationContent.classList.toggle('show'); // Toggle the visibility of notification content
        });
    
        document.addEventListener('click', function() {
            notificationContent.classList.remove('show'); // Hide notification content when clicking outside of it
        });
    
        notificationContent.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent the click event from propagating to the document
        });
    });
