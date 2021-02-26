<div class="article">
  <article class="article__primary article__primary--spotlight">
    <h2 class="hidden">spotlight</h2>
    <section class="article__title">
      <h3 class="article__title">Plan be</h3>
      <p class="article__subtitle">Maak een betoging!</p>
      <p class="account__name"><?php if(!empty($_SESSION['user']))echo $_SESSION['user']['username']; ?></p>
    </section>

    <section class="section__buttons">
      <h3 class="hidden">Keuze</h3>
      <a class="section__button active" href="index.php?page=keuze">Vorige</a>
      <a class="section__button" href="index.php?page=overview">Join een betoging</a>
      <a class="section__button" href="index.php?page=mijn">Mijn betogingen</a>
      <a class="section__button section__button--logout" href="index.php?page=logout">Uitloggen</a>
    </section>

    <section class="counter">
      <h3 class="hidden">Counter</h3>
      <p class="total__protest">Aantal betogingen </p>
      <p class="total__protest--number"><?php echo $countAll['COUNT(*)']; ?></p>
    </section>
  </article>

  <article class="article__secondary article__secondary--spotlight align__center">
    <h2 class="article__title hidden__titles">Plan be</h2>
    <p class="article__subtitle hidden__titles">Maak een betoging!</p>
    <form action="index.php?page=spotlight" method="post" class="form__spotlight" enctype="multipart/form-data">
    <input type="hidden" name="action" value="add-protest" />
      <div class="page-row row0">

        <input class="form__input" type="text" name="title" placeholder="Titel" required>
        <span class="error"><?php if(!empty($errors['title'])){ echo $errors['title'];} ?></span>

        <input class="form__input" id="today" type="date" name="date" placeholder="Datum" required>
        <span class="error"><?php if(!empty($errors['date'])){ echo $errors['date'];} ?></span>

        <div class="radio__groups">
          <div class="radio__group radio__group--spotlight">
            <input type="radio" id="rustig" name="movement" value="Rustig" checked>
            <label for="rustig">Rustig</label>

            <input type="radio" id="geweldadig" name="movement" value="Geweldadig">
            <label for="geweldadig">Geweldadig</label>
            <span class="error"><?php if(!empty($errors['movement'])){ echo $errors['movement'];} ?></span>
          </div>

          <div class="radio__group radio__group--spotlight">
            <input type="radio" id="kort" name="flow" value="Kort" checked>
            <label for="kort">Kort</label>

            <input type="radio" id="lang" name="flow" value="Lang" >
            <label for="lang">Lang</label>
            <span class="error"><?php if(!empty($errors['flow'])){ echo $errors['flow'];} ?></span>
          </div>

          <div class="radio__group radio__group--spotlight">
            <input type="radio" id="eenmalig" name="stretch" value="Eenmalig" checked>
            <label for="eenmalig">Eenmalig</label>

            <input type="radio" id="terugkeerend" name="stretch" value="Terugkeerend">
            <label for="terugkeerend">Terugkeerend</label>
            <span class="error"><?php if(!empty($errors['stretch'])){ echo $errors['stretch'];} ?></span>
          </div>
        </div>

        <textarea class="form__input form__input--textarea" name="description" id="description" placeholder="Beschrijving" rows="6" required></textarea>
        <span class="error"><?php if(!empty($errors['description'])){ echo $errors['description'];} ?></span>
      </div>

      <div class="page-row row1">
        <input id="myInput" class="form__input form__input--city" type="text" name="place" placeholder="Waar ga je je betoging houden?" required>
        <span class="error"><?php if(!empty($errors['place'])){ echo $errors['place'];} ?></span>
      </div>

      <div class="page-row row2">
        <label for="media" class="form__input--select">Ik zou graag het
          <select name="media" id="media" >
            <option value="internationaal" >internationale</option>
            <option value="nationaal">nationale</option>
            <option value="lokaal">lokale</option>
          </select>
        </label>

        <label for="who" class="form__input--select"> nieuws bereiken want de
          <select name="who" id="who">
            <option value="gemeenteraad" >gemeente raad</option>
            <option value="regering">regering</option>
            <option value="koning">koning</option>
          </select>
        </label>

        <label for="place_news" class="form__input--select"> moet mij horen en weten dat
          <select name="place_news" id="where">
            <option value="krant">de krant</option>
            <option value="nieuws">het nieuws</option>
            <option value="socialmedia">sociale media</option>
          </select>
        </label> er al mee vol staat!

        <span class="error"><?php if(!empty($errors['media'])){ echo $errors['media'];} ?></span><br>
        <span class="error"><?php if(!empty($errors['who'])){ echo $errors['who'];} ?></span><br>
        <span class="error"><?php if(!empty($errors['place_news'])){ echo $errors['place_news'];} ?></span>
      </div>

      <div class="buttons">
        <button type="button" class="form__button form__button--vorige" id="prevBtn">Vorige</button>
        <button type="button" class="form__button form__button--volgende" id="nextBtn">Volgende</button>
        <input type="submit" class="form__button form__button--submit" value="Plaatsen">
      </div>
    </form>
  </article>
</div>
<script src="js/spotlight.js"></script>
