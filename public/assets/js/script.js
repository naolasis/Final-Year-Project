// for side bar
const navToggle = document.querySelector('.nav-toggle');
const side_bar = document.querySelector('.side-bar');
const content = document.querySelector('.body-element-container');

navToggle.addEventListener('click', () => {
    side_bar.classList.toggle('side-bar-hide');
    content.classList.toggle('body-element-container-vissible')
})

content.addEventListener('click', () => {
    side_bar.classList.remove('side-bar-hide');
    content.classList.remove('body-element-container-vissible')
})

// for side bar list
const sideBarLists = document.querySelectorAll('.side-bar-list');

sideBarLists.forEach(function(sideBarList) {
    sideBarList.addEventListener('click', function() {
        const clickedInnerList = this.querySelector('.inner-list');
        const clickedLeftAngleIcon = this.querySelector('.left-angle-icon');

        sideBarLists.forEach(function(otherSideBarList) {
            if (otherSideBarList !== sideBarList) {
                const otherInnerList = otherSideBarList.querySelector('.inner-list');
                const otherLeftAngleIcon = otherSideBarList.querySelector('.left-angle-icon');
                if (otherInnerList.classList.contains('inner-list-visible')) {
                    otherInnerList.classList.remove('inner-list-visible');
                    otherLeftAngleIcon.classList.remove('left-angle-icon-rotate');
                }
            }
        });

        clickedInnerList.classList.toggle('inner-list-visible');
        clickedLeftAngleIcon.classList.toggle('left-angle-icon-rotate');
    });
});

