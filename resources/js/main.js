console.log('hello');
let menu = document.querySelector('#header');
let leftPanel = document.querySelector('.left-panel');
let menuPosition = menu.getBoundingClientRect();
let placeholder = document.createElement('div');
placeholder.style.width = menuPosition.width + 'px';
placeholder.style.height = menuPosition.height + 'px';
// let leftPlaceholder = document.createElement('div');
// leftPlaceholder.style.width = menuPosition.width + 'px';
// leftPlaceholder.style.height = menuPosition.height + 'px';
let isAdded = false;

window.addEventListener('scroll', function() {
    if (window.pageYOffset >= menuPosition.top && !isAdded) {
        menu.classList.add('sticky');
        menu.parentNode.insertBefore(placeholder, menu);
        leftPanel.classList.add('fixed');
        // leftPanel.parentNode.insertBefore(leftPlaceholder, leftPanel)
        isAdded = true;
    } else if (window.pageYOffset < menuPosition.top && isAdded) {
        menu.classList.remove('sticky');
        menu.parentNode.removeChild(placeholder);
        leftPanel.classList.remove('fixed');
        // leftPanel.parentNode.removeChild(leftPlaceholder);
        isAdded = false;
    }
});

let menuButton = document.querySelector('.menu-button');
let pageWrapper = document.querySelector('.page-wrapper');
let isOpend = true;
menuButton.addEventListener('click', function(event){
if (isOpend) {
  leftPanel.classList.add('closed');
  pageWrapper.classList.add('full-width');
  isOpend = false;
} else if (!isOpend){
  console.log('hello');
  leftPanel.classList.remove('closed');
  pageWrapper.classList.remove('full-width');
  isOpend = true;
}
});

let message = document.querySelector('.message');

    setTimeout(function(){
        message.className = "disable";
    }, 3000);

