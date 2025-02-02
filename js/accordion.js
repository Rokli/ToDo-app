let dayTrue = "123";

document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const accordion = header.parentElement;
      accordion.classList.toggle('active');
    });
  });

function addEvent(){
  const inputTime = document.getElementById("accordion-modal-time");
  const inputTask = document.getElementById("accordion-modal-task");

  const task = inputTask.value;
  const time = inputTime.value;

  inputTask.value = "";
  inputTime.value = "";

  fetch("/save_task", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      task: task,
      task_time: time,
      day: dayTrue
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      addTaskToUI(task, time, dayTrue);
    } else {
      alert("Ошибка сохранения!");
    }
  })
  .catch(error => console.error("Ошибка:", error));

  const button = document.getElementById("button-" + dayTrue);
  const accordion = button.closest(".accordion");
  const content = accordion.querySelector(".accordion-content");

  let taskList = content.querySelector("ul");
  if (!taskList) {
    taskList = document.createElement("ul");
    content.appendChild(taskList); 
  }

  const newTask = document.createElement("li");
  newTask.textContent = "Задача:" + task + " Время:" + time; 
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

function addTaskToUI(task, time, day) {
  const button = document.getElementById("button-" + day);
  const accordion = button.closest(".accordion");
  const content = accordion.querySelector(".accordion-content");

  let taskList = content.querySelector("ul");
  if (!taskList) {
    taskList = document.createElement("ul");
    content.appendChild(taskList);
  }

  const newTask = document.createElement("li");
  newTask.textContent = `Задача: ${task} Время: ${time}`;
  taskList.appendChild(newTask);
}

document.addEventListener("DOMContentLoaded", () => {
  fetch("/get_task")
    .then(response => response.json())
    .then(tasks => {
      tasks.forEach(task => {
        addTaskToUI(task.task, task.task_time, task.day);
      });
    })
    .catch(error => console.error("Ошибка загрузки задач:", error));
});