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

document.addEventListener("DOMContentLoaded", () => {
  const secondsEl = document.getElementById("secondes-counter");
  const secondsEl2 = document.getElementById("secondes-counter-full");

  if (secondsEl && secondsEl2) {
    setInterval(() => {
      let secondsValue = parseInt(secondsEl.textContent.replace(/\s/g, ""));
      let secondsValue2 = parseInt(secondsEl2.textContent.replace(/\s/g, ""));

      if (secondsValue >= 59) {
        secondsValue = 0;
        secondsEl.textContent = secondsValue.toLocaleString("fr-FR");

        secondsValue2++;
        secondsEl2.textContent = secondsValue2.toLocaleString("fr-FR");

        const minutesEl = document.getElementById("minutes-counter");
        const minutesEl2 = document.getElementById("minutes-counter-full");

        if (minutesEl && minutesEl2) {
          let minutesValue = parseInt(minutesEl.textContent.replace(/\s/g, ""));
          let minutesValue2 = parseInt(minutesEl2.textContent.replace(/\s/g, ""));

          if (minutesValue >= 59) {
            minutesValue = 0;
            minutesEl.textContent = minutesValue.toLocaleString("fr-FR");

            minutesValue2++;
            minutesEl2.textContent = minutesValue2.toLocaleString("fr-FR");

            const hoursEl = document.getElementById("heures-counter");
            const hoursEl2 = document.getElementById("heures-counter-full");

            if (hoursEl && hoursEl2) {
              let hoursValue = parseInt(hoursEl.textContent.replace(/\s/g, ""));
              let hoursValue2 = parseInt(hoursEl2.textContent.replace(/\s/g, ""));

              if (hoursValue >= 23) {
                hoursValue = 0;
                hoursEl.textContent = hoursValue.toLocaleString("fr-FR");

                hoursValue2++;
                hoursEl2.textContent = hoursValue2.toLocaleString("fr-FR");

                const daysEl = document.getElementById("jours-counter");
                const daysEl2 = document.getElementById("jours-counter-full");

                if (daysEl && daysEl2) {
                  let daysValue = parseInt(daysEl.textContent.replace(/\s/g, ""));
                  let daysValue2 = parseInt(daysEl2.textContent.replace(/\s/g, ""));

                  if (daysValue >= 29) {
                    daysValue = 0;
                    daysEl.textContent = daysValue.toLocaleString("fr-FR");

                    daysValue2++;
                    daysEl2.textContent = daysValue2.toLocaleString("fr-FR");

                    const monthsEl = document.getElementById("mois-counter");
                    const monthsEl2 = document.getElementById("mois-counter-full");

                    if (monthsEl && monthsEl2) {
                      let monthsValue = parseInt(monthsEl.textContent.replace(/\s/g, ""));
                      let monthsValue2 = parseInt(monthsEl2.textContent.replace(/\s/g, ""));

                      if (monthsValue >= 11) {
                        monthsValue = 0;
                        monthsEl.textContent = monthsValue.toLocaleString("fr-FR");

                        monthsValue2++;
                        monthsEl2.textContent = monthsValue2.toLocaleString("fr-FR");

                        const yearsEl = document.getElementById("années-counter");
                        const yearsEl2 = document.getElementById("années-counter-full");

                        if (yearsEl && yearsEl2) {
                          let yearsValue = parseInt(yearsEl.textContent.replace(/\s/g, ""));
                          let yearsValue2 = parseInt(yearsEl2.textContent.replace(/\s/g, ""));

                          yearsValue++;
                          yearsValue2++;

                          yearsEl.textContent = yearsValue.toLocaleString("fr-FR");
                          yearsEl2.textContent = yearsValue2.toLocaleString("fr-FR");
                        }
                      } else {
                        monthsValue++;
                        monthsEl.textContent = monthsValue.toLocaleString("fr-FR");

                        monthsValue2++;
                        monthsEl2.textContent = monthsValue2.toLocaleString("fr-FR");
                      }
                    }
                  } else {
                    daysValue++;
                    daysEl.textContent = daysValue.toLocaleString("fr-FR");

                    daysValue2++;
                    daysEl2.textContent = daysValue2.toLocaleString("fr-FR");
                  }
                }
              } else {
                hoursValue++;
                hoursEl.textContent = hoursValue.toLocaleString("fr-FR");

                hoursValue2++;
                hoursEl2.textContent = hoursValue2.toLocaleString("fr-FR");
              }
            }
          } else {
            minutesValue++;
            minutesEl.textContent = minutesValue.toLocaleString("fr-FR");

            minutesValue2++;
            minutesEl2.textContent = minutesValue2.toLocaleString("fr-FR");
          }
        }
      } else {
        secondsValue++;
        secondsEl.textContent = secondsValue.toLocaleString("fr-FR");

        secondsValue2++;
        secondsEl2.textContent = secondsValue2.toLocaleString("fr-FR");
      }
    }, 1000);
  }
});
