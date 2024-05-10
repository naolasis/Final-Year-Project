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
