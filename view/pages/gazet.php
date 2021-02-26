<div class="article article__overview">
  <article class="article__primary hidden--article">
    <h2 class="hidden">Overview</h2>
    <section class="article__title">
      <h3 class="article__title">Plan be</h3>
      <p class="article__subtitle">Jouw betogingen</p>
      <p class="account__name"><?php if(!empty($_SESSION['user']))echo $_SESSION['user']['username']; ?></p>
    </section>

    <section class="section__buttons">
      <h3 class="hidden">Keuze</h3>
      <a class="section__button" href="index.php?page=spotlight">Plan een betoging</a>
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

  <article class="article__secondary article__secondary--filter show">
    <h2 class="article__title hidden__titles">Plan be</h2>
    <p class="article__subtitle hidden__titles">Jouw betogingen</p>

    <form action="index.php?page=overview" method="get" class="filter__form" id="filter__form">
    <input type="hidden" name="page" value="overview" />

      <div class="radio__group radio__group--overview">
        <input class="filter__input" type="radio" id="all" name="tags" value="all" checked>
        <label for="all">All</label>

        <input class="filter__input" type="radio" id="upcoming" name="tags" value="upcoming">
        <label for="upcoming">Upcoming</label>

        <?php foreach($tags as $tag): ?>
          <input class="filter__input" type="radio" id="<?php echo $tag['name']; ?>" name="tags" value="<?php echo $tag['name']; ?>">
          <label class="radio__group label" for="<?php echo $tag['name']; ?>"><?php echo $tag['name']; ?></label>
        <?php endforeach; ?>
      </div>

      <input type="submit" class="form__button" id="filter__button" value="filter">
    </form>

    <section class="section__protest--button">
      <h3 class="hidden">Button vorige</h3>
      <a href="index.php?page=keuze" class="form__button active hidden__button">Vorige</a>
    </section>

    <div class="search__div">
        <?php foreach ($protests as $protest): ?>
          <a href="index.php?page=detail&id=<?php echo $protest['id']; ?>" class="section__protest">
            <section>
              <h3 class="section__protest--title"><?php echo $protest['title']; ?> </h3>
              <p class="section__protest--description">
                <?php echo $protest['description']; ?>
              </p>
              <p class="section__protest--details"><?php echo $protest['date']; ?></p>
              <p class="section__protest--details"><?php echo $protest['movement']; ?>, <?php echo $protest['flow']; ?>, <?php echo $protest['stretch']; ?>   </p>
            </section>
          </a>
        <?php endforeach; ?>
      <div>
  </article>
</div>
<script src="js/filter.js"></script>
