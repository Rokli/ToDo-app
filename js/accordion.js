let dayTrue = "123";

document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const accordion = header.parentElement;
      accordion.classList.toggle('active');
    });
  });

function addEvent(){
  const input = document.getElementById("accordion-modal-task");
  const task = input.value;
  input.value = "";

  const button = document.getElementById("button-" + dayTrue);
  const accordion = button.closest(".accordion");
  const content = accordion.querySelector(".accordion-content");

  let taskList = content.querySelector("ul");
  if (!taskList) {
    taskList = document.createElement("ul");
    content.appendChild(taskList); 
  }

  const newTask = document.createElement("li");
  newTask.textContent = task; 
  taskList.appendChild(newTask); 
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

document.getElementById("accordion-event-form").addEventListener("submit", function(event){
  event.preventDefault(); 
  addEvent(); 
  closeModal(); 
});