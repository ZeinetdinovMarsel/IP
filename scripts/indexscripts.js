const mouseTarget = document.getElementById('home-img');

mouseTarget.addEventListener('mouseenter', e => {
  mouseTarget.style.background = 'url("../img/harambe.gif") center';
  mouseTarget.style.backgroundSize = 'cover';
});

mouseTarget.addEventListener('mouseleave', e => {
    mouseTarget.style.background = 'url("../img/harambe.png") center';
    mouseTarget.style.backgroundSize = 'cover';
});

