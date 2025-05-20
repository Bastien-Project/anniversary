<!DOCTYPE HTML>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <?php
  if (!empty($_POST['birthday'])) {
    $birthday = $_POST['birthday'];
    $date = new DateTime($birthday);
    $now = new DateTime();
    $interval = $now->diff($date);
  } else {
  ?>

    <form id="birthdayForm" method="POST">
      <p>Entrez votre date de naissance :</p>
      <div>
        <label for="year">Année de naissance :&nbsp</label>
        <select name="year" id="year" required>
          <?php
          $currentYear = intval(date('Y'));
          for ($i = $currentYear; $i >= 1900; $i--) {
            $selected = (isset($year) && $i == $year) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="month">Mois de naissance :&nbsp</label>
        <select name="month" id="month" required>
          <?php
          for ($i = 1; $i <= 12; $i++) {
            $selected = (isset($month) && $i == $month) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="day">Jour de naissance :&nbsp</label>
        <select name="day" id="day" required>
          <?php
          for ($i = 1; $i <= 31; $i++) {
            $selected = (isset($day) && $i == $day) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="hour">Heure de naissance :&nbsp</label>
        <select name="hour" id="hour">
          <?php
          for ($i = 0; $i <= 23; $i++) {
            $selected = (isset($hour) && $i == $hour) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="minute">Minute de naissance :&nbsp</label>
        <select name="minute" id="minute">
          <?php
          for ($i = 0; $i <= 59; $i++) {
            $selected = (isset($minutes) && $i == $minutes) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="second">Seconde de naissance :&nbsp</label>
        <select name="second" id="second">
          <?php
          for ($i = 0; $i <= 59; $i++) {
            $selected = (isset($seconds) && $i == $seconds) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
          }
          ?>
        </select>
      </div>

      <input type="hidden" name="birthday" id="birthday">

      <input type="submit" value="Valider">
    </form>

  <?php }
  if (!empty($_POST['birthday'])) { ?>
    <p>Vous êtes agé de :</p>
    <div class="container elapsedTime">
      <?php
      $counter = ['années' => $interval->y, 'mois' => $interval->m, 'jours' => $interval->d, 'heures' => $interval->h, 'minutes' => $interval->i, 'secondes' => $interval->s];

      foreach ($counter as $key => $value) {
        if ($value > 0) {
          echo "
          <div class='clock_bg'>
            <div class='clock_counter' id='$key-counter'>$value</div>
            <div class='clock_label'>$key</div>
          </div>";
        }
      } ?>
    </div>

  <?php
    // Calculer le nombre d'année, mois, jours, heures, minutes et secondes entiers
    $years = $interval->y;
    $months = $years * 12 + $interval->m;
    // Prise en comptes des années bissextiles
    $days = $years * 365 + $interval->d + (intdiv($years, 4) - intdiv($years, 100) + intdiv($years, 400));
    $hours = $days * 24 + $interval->h;
    $minutes = $hours * 60 + $interval->i;
    $seconds = $minutes * 60 + $interval->s;

    $counterFull = ['années entières' => $years, 'mois entiers' => $months, 'jours entiers' => $days, 'heures entières' => $hours, 'minutes entières' => $minutes, 'secondes entières' => $seconds];
    $label = ['Soit', 'Ou encore', 'Mais aussi', 'Ainsi que', 'En somme', 'Et de surcroît'];
    $i = 0;
    foreach ($counterFull as $key => $value) {
      if ($value > 0) {
        // affiches juste le nom de la clé mais juste le premier mot
        $keyFirst = explode(' ', $key)[0];
        echo "
        <p class='oneUnitTime'>{$label[$i]} : </p>
        <div class='container elapsedTime'>
          <div class='clock_bg alone'>
            <div class='clock_counter' id='$keyFirst-counter-full'>" . number_format($value, 0, '', ' ') . "</div>
            <div class='clock_label'>$key</div>
          </div>
        </div>";
        $i++;
      }
    }
  } ?>

</body>

</html>