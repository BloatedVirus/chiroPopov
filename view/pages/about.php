<div class="article">
  <article class="article__primary">
    <h2 class="hidden">Keuze</h2>
    <section class="article__title">
      <h3 class="article__title">Plan be</h3>
      <p class="article__subtitle">Welkom terug</p>
      <p class="account__name"><?php if(!empty($_SESSION['user']))echo $_SESSION['user']['username']; ?></p>
    </section>

    <section class="section__buttons">
      <h3 class="hidden">Keuze</h3>
      <a class="section__button" href="index.php?page=spotlight">Plan een betoging</a>
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

  <article class="article__secondary">
    <h2 class="article__title">Opkomende betogingen</h2>

    <?php foreach ($allProtest as $protest): ?>
      <a href="index.php?page=detail&id=<?php echo $protest['id']; ?>" class="section__protest">

      <section>
        <h3 class="section__protest--title"><?php echo $protest['title']; ?> </h3>
        <p class="section__protest--description"><?php echo $protest['description']; ?></p>
        <p class="section__protest--details"><?php echo $protest['date']; ?></p>
        <p class="section__protest--details"><?php echo $protest['movement']; ?>, <?php echo $protest['flow']; ?>, <?php echo $protest['stretch']; ?>   </p>
      </section>
      </a>
    <?php endforeach; ?>
  </article>
</div>
