function minTwoDigits(n) {
    return (n < 10 ? '0' : '') + n;
}

// Récupérer les valeurs du formulaire et mettre à jour l'URL
const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const year = document.querySelector('#year').value;
    const month = document.querySelector('#month').value;
    const day = document.querySelector('#day').value;
    const hour = document.querySelector('#hour').value;
    const minute = document.querySelector('#minute').value;
    const second = document.querySelector('#second').value;
    const birthday = `${year}-${minTwoDigits(month)}-${minTwoDigits(day)}T${minTwoDigits(hour)}:${minTwoDigits(minute)}:${minTwoDigits(second)}`;
    console.log(birthday);
    const url = `index.php?birthday=${birthday}`;
    window.location.href = url;
});

// Mettre à jour le compteur chaque seconde
setInterval(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const birthdayParam = urlParams.get('birthday');

    if (!birthdayParam) return;

    console.log(birthdayParam);

    const annivDate = new Date(birthdayParam).getTime();
    const now = new Date().getTime();
    const distance = Math.trunc((now - annivDate) /1000);

    const days = Math.floor(distance / 86400);
    const weeks = Math.floor(days / 7);
    const years = Math.floor(weeks / 52);
    const weeksRemainder = weeks % 52;
    const daysRemainder = days % 7;
    const hours = Math.floor((distance % (86400)) / 3600);
    const minutes = Math.floor((distance % 3600) / 60);
    const seconds = Math.floor((distance % 60));

    document.querySelector("#years .clock_counter").innerText = minTwoDigits(years);
    document.querySelector("#weeks .clock_counter").innerText = minTwoDigits(weeksRemainder);
    document.querySelector("#days .clock_counter").innerText = minTwoDigits(daysRemainder);
    document.querySelector("#hours .clock_counter").innerText = minTwoDigits(hours);
    document.querySelector("#minutes .clock_counter").innerText = minTwoDigits(minutes);
    document.querySelector("#seconds .clock_counter").innerText = minTwoDigits(seconds);
}, 1000);
