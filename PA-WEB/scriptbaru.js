const gambarheader = document.querySelector('.gambarheader');

window.addEventListener('scroll', () => {
     const scrollPos = window.scrollY;
     gambarheader.style.transform = `translateY(${scrollPos * 0.6}px)`;
});