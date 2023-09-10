function changeContent() {
  let content = document.getElementById('content');
  content.style.display = 'flex';

  let elementsToHide = document.querySelectorAll('.main-title1, .main-title2, .main h5, .button');
  for (let i = 0; i < elementsToHide.length; i++) {
    elementsToHide[i].style.display = 'none';
  }
}

let myButton = document.getElementById('myButton');
myButton.addEventListener('click', changeContent);
