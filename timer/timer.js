document.addEventListener('DOMContentLoaded', function() {

    function readCookie(name) {

      let dateOfBirthDay = name+"=";
      let spl = document.cookie.split(";");
      
      for(let i=0; i < spl.length; i++) {      
        let c = spl[i]; 

        while(c.charAt(0) == " ") {        
          c = c.substring(1, c.length);          
        }
        
        if(c.indexOf(dateOfBirthDay) == 0) {          
          return c.substring(dateOfBirthDay.length, c.length);          
        }        
      }      
      return null;      
    }

    let valueCookie = readCookie("dateOfBirthDay"); // дата рождения из input   
     
    let birthDay = new Date(valueCookie);
    let today = new Date();
    let month = birthDay.getMonth(); // месяц рождения    
    let day = birthDay.getDate(); // день рождения
    let currentYear = today.getFullYear();
    let currentDay = today.getDate();

    // конечная дата, например 1 июля 2021
    let deadline1 = new Date(currentYear, month, day);
    // id таймера
    let timerId = null;

    let diff1 = (deadline1 - new Date()) / 1000;
    if (currentDay == day && diff1 < 0) {
      timerId = null;
      document.cookie = "birthDayNow = yes";
    } else if (diff1 < -86401) {
      currentYear = today.getFullYear() + 1;
      document.cookie = "birthDayNow = no";
    }

    let deadline2 = new Date(currentYear, month, day);

    // склонение числительных
    function declensionNum(num, words) {
      return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ? num % 10 : 5]];
    }
    // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
    function countdownTimer() {
      const diff = deadline2 - new Date();
      if (diff < 0) {
        clearInterval(timerId);
        console.log(diff);
      }
      const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
      const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
      const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
      const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
      $days.textContent = days < 10 ? '0' + days : days;
      $hours.textContent = hours < 10 ? '0' + hours : hours;
      $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
      $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
      $days.dataset.title = declensionNum(days, ['день', 'дня', 'дней']);
      $hours.dataset.title = declensionNum(hours, ['час', 'часа', 'часов']);
      $minutes.dataset.title = declensionNum(minutes, ['минута', 'минуты', 'минут']);
      $seconds.dataset.title = declensionNum(seconds, ['секунда', 'секунды', 'секунд']);
    }
    // получаем элементы, содержащие компоненты даты
    const $days = document.querySelector('.timer__days');
    const $hours = document.querySelector('.timer__hours');
    const $minutes = document.querySelector('.timer__minutes');
    const $seconds = document.querySelector('.timer__seconds');
    // вызываем функцию countdownTimer
    countdownTimer();
    // вызываем функцию countdownTimer каждую секунду
    timerId = setInterval(countdownTimer, 1000);
  });