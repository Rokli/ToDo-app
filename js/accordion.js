document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const accordion = header.parentElement;
      accordion.classList.toggle('active');
    });
  });

function AddEvent(day){
    const button = document.getElementById("button-" + day);
    const accordion = button.closest(".accordion");
    const content = accordion.querySelector(".accordion-content");
    content.innerHTML = "<p>Новая задача добавлена!</p>";
}