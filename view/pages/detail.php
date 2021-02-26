<div class="article article__detail">
  <article class="article__primary article__primary--spotlight">
    <h2 class="hidden">Responsive menu</h2>
    <section class="article__title">
      <h3 class="article__title">Plan be</h3>
      <p class="article__subtitle">Details</p>
      <p class="account__name"><?php if(!empty($_SESSION['user']))echo $_SESSION['user']['username']; ?></p>
    </section>

    <section class="section__buttons">
      <h3 class="hidden">Buttons</h3>
      <a class="section__button" href="index.php?page=spotlight">Maak een betoging</a>
      <a class="section__button active" href="index.php?page=keuze">Vorige</a>
      <a class="section__button" href="index.php?page=mijn">Mijn betogingen</a>
      <a class="section__button section__button--logout" href="index.php?page=logout">Uitloggen</a>
    </section>

    <section class="counter">
      <h3 class="hidden">Counter</h3>
      <p class="total__protest">Aantal betogingen </p>
      <p class="total__protest--number"><?php echo $countAll['COUNT(*)']; ?></p>
    </section>
  </article>

  <article class="article__secondary article__secondary--detail">
    <h2 class="article__title"><?php echo $selectedProtest['title']; ?></h2>

    <p class="article__subtitle">
      <?php echo $selectedProtest['movement']; ?>,
      <?php echo $selectedProtest['flow']; ?>,
      <?php echo $selectedProtest['stretch']; ?>.
    </p> <!-- TAGS -->

    <section class="section__detail">
      <h3 class="hidden">Content</h3>
      <p class="section__text">
        <?php echo $selectedProtest['description']; ?>. Deze betoging speelt zich af in <strong class="bold"><?php echo $selectedProtest['place']; ?></strong>
      </p> <!-- DESCRIPTION -->

      <p class="section__text--media">Ik zou graag het <strong class="bold"><?php echo $selectedProtest['media']; ?></strong> nieuws bereiken want de <strong class="bold"><?php echo $selectedProtest['who']; ?></strong> moet mij horen en weten dat <strong class="bold"><?php echo $selectedProtest['place_news']; ?></strong> er al mee vol staat!</p>

      <p class="section__text--joined">
        Al <?php echo $count['COUNT(*)']; ?> mensen doen mee!
      </p>

      <form action="index.php?page=detail&id=<?php echo $selectedProtest['id']; ?>" method="post" class="form__register" enctype="multipart/form-data">
        <input type="hidden" name="action" value="join" />
        <input class="form__button black" type="submit" value="Ik doe mee!">
      </form>
      <a href="index.php?page=overview" class="section__button active hidden__button">Vorige</a>
    </section>
  </article>
</div>
