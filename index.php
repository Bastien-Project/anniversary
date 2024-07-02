<!DOCTYPE HTML>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php 
  if (!empty($_GET['birthday'])) {
    $date = new DateTime($_GET['birthday']);
    $year = $date->format('Y');
    $month = $date->format('m');
    $day = $date->format('d');
    $hour = $date->format('H');
    $minutes = $date->format('i');
    $seconds = $date->format('s');

    echo '<pre>';
    var_dump($year, $month, $day, $hour, $minutes, $seconds);

    $now = new DateTime();
    $interval = $now->diff($date);
    var_dump($interval);
    echo '</pre>';
  }
  ?>
  
  <!-- formulaire entrer sa date de naissance -->
  <form>
    <label for="year">Année de naissance</label>
    <select name="year" id="year" required>
      <?php
      $currentYear = intval(date('Y'));
      for ($i = $currentYear; $i >= 1900; $i--) {
        $selected = (isset($year) && $i == $year) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <label for="month">Mois de naissance</label>
    <select name="month" id="month" required>
      <?php
      for ($i = 1; $i <= 12; $i++) {
        $selected = (isset($month) && $i == $month) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <label for="day">Jour de naissance</label>
    <select name="day" id="day" required>
      <?php
      for ($i = 1; $i <= 31; $i++) {
        $selected = (isset($day) && $i == $day) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <label for="hour">Heure de naissance</label>
    <select name="hour" id="hour">
      <?php
      for ($i = 0; $i <= 23; $i++) {
        $selected = (isset($hour) ? ($i == $hour) : ($i == 12)) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <label for="minute">Minute de naissance</label>
    <select name="minute" id="minute">
      <?php
      for ($i = 0; $i <= 59; $i++) {
        $selected = (isset($minutes) && $i == $minutes) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <label for="second">Seconde de naissance</label>
    <select name="second" id="second">
      <?php
      for ($i = 0; $i <= 59; $i++) {
        $selected = (isset($seconds) && $i == $seconds) ? 'selected' : '';
        echo "<option value='$i' $selected>$i</option>";
      }
      ?>
    </select>
    <input type="submit" value="Valider">
  </form>

  <?php
  // Vérifier si les paramètres GET sont définis et valides
  if (!empty($_GET['birthday'])) {
  ?>
    <div class="container countdown">
      <div id="demo"></div>
      <div class="countdowncontainer">
        <div id="years" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">années</div>
        </div>
        <div id="weeks" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">semaines</div>
        </div>
        <div id="days" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">jours</div>
        </div>
        <div id="hours" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">heures</div>
        </div>
        <div id="minutes" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">minutes</div>
        </div>
        <div id="seconds" class="clock_bg">
          <div class="clock_counter"></div>
          <div class="clock_label">secondes</div>
        </div>
      </div>
    </div>
  <?php } ?>

  <script type="text/javascript" src="script.js"></script>
</body>

</html>
