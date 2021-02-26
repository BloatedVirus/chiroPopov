{

  const $joined = document.querySelector(`#defaultOpen`);
  const $created = document.querySelector(`#created`);

  const openTab = (evt, tabName) => {
    let i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  const init = () => {

    $joined.addEventListener(`click`, openTab(evt, 'joined'));
    $created.addEventListener(`click`, openTab(evt, 'Protests'));

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    openTab();
  };

  init();
}
