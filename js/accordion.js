let dayTrue = "123";

document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const accordion = header.parentElement;
      accordion.classList.toggle('active');
    });
  });

function addEvent(){
  const task = document.getElementById("accordion-modal-task").value;



  const button = document.getElementById("button-" + dayTrue);
  const accordion = button.closest(".accordion");
  const content = accordion.querySelector(".accordion-content");
  content.innerHTML = `<p>${task}</p>`;
}

function openModal(day) {
  const modal = document.getElementById("accordion-modal");
  dayTrue = day;
  modal.style.display = "flex"; 
}

function closeModal(){
  const modal = document.getElementById("accordion-modal");
  modal.style.display = "none"; 
}
