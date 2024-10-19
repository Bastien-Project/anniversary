function updateCountdown(birthday) {
    const birthDate = new Date(birthday);
    setInterval(function () {
      const now = new Date();
      const diff = new Date(now - birthDate);
  
      const years = diff.getUTCFullYear() - 1970;
      const months = diff.getUTCMonth();
      const days = diff.getUTCDate() - 1;
      const hours = diff.getUTCHours();
      const minutes = diff.getUTCMinutes();
      const seconds = diff.getUTCSeconds();
  
      document.querySelector('#years .clock_counter').innerText = years;
      document.querySelector('#months .clock_counter').innerText = months;
      document.querySelector('#days .clock_counter').innerText = days;
      document.querySelector('#hours .clock_counter').innerText = hours;
      document.querySelector('#minutes .clock_counter').innerText = minutes;
      document.querySelector('#seconds .clock_counter').innerText = seconds;
    }, 1000);
  }
  
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('birthdayForm').addEventListener('submit', function (e) {
      e.preventDefault();
  
      var year = document.getElementById('year').value;
      var month = document.getElementById('month').value.padStart(2, '0');
      var day = document.getElementById('day').value.padStart(2, '0');
      var hour = document.getElementById('hour').value.padStart(2, '0');
      var minute = document.getElementById('minute').value.padStart(2, '0');
      var second = document.getElementById('second').value.padStart(2, '0');
  
      // Format ISO 8601
      var birthday = `${year}-${month}-${day}T${hour}:${minute}:${second}`;
      document.getElementById('birthday').value = birthday;
  
      this.submit();
      updateCountdown(birthday);
    });
  
    const birthdayInput = document.getElementById('birthday').value;
    if (birthdayInput) {
      updateCountdown(birthdayInput);
    }
  });
  