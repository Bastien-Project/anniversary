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
    <div class="container countdown">
      <div id="years" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->y; ?></div>
        <div class="clock_label">années</div>
      </div>
      <div id="months" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->m; ?></div>
        <div class="clock_label">mois</div>
      </div>
      <div id="days" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->d; ?></div>
        <div class="clock_label">jours</div>
      </div>
      <div id="hours" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->h; ?></div>
        <div class="clock_label">heures</div>
      </div>
      <div id="minutes" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->i; ?></div>
        <div class="clock_label">minutes</div>
      </div>
      <div id="seconds" class="clock_bg">
        <div class="clock_counter"><?php echo $interval->s; ?></div>
        <div class="clock_label">secondes</div>
      </div>
    </div>
  <?php } ?>

</body>

</html>