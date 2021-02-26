{
  const $prevBtn = document.querySelector(`#prevBtn`);
  const $nextBtn = document.querySelector(`#nextBtn`);
  const rowsAmount = document.querySelectorAll(`.page-row`).length;
  let tabCounter = 0;

  const init = () => {

    $prevBtn.addEventListener(`click`, previousTab);
    $nextBtn.addEventListener(`click`, nextTab);
  };

  const nextTab = () => {
    document.querySelector(`.row${tabCounter}`).style.display = `none`;
    if (tabCounter >= rowsAmount - 1) {
      tabCounter = 2;
    } else {
      tabCounter++;
    }
    document.querySelector(`.row${tabCounter}`).style.display = `block`;
  };

  const previousTab = () => {
    document.querySelector(`.row${tabCounter}`).style.display = `none`;
    if (tabCounter === 0) {
      tabCounter = 0;
    } else {
      tabCounter--;
    }
    document.querySelector(`.row${tabCounter}`).style.display = `block`;
  };

  init();
}
