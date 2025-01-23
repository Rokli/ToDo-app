document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const accordion = header.parentElement;
  
      // Закрыть другие секции (если нужно поведение "один открыт в момент")
    //   document.querySelectorAll('.accordion').forEach(item => {
    //     if (item !== accordion) {
    //       item.classList.remove('active');
    //     }
    //   });
  
      // Переключить текущее состояние
      accordion.classList.toggle('active');
    });
  });