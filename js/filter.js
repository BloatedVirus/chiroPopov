{
  const handleSubmitForm = e => {
    e.preventDefault();
    submitWithJS();
  };

  const handleInputField = e => {
    submitWithJS();
  }

  const submitWithJS = async () => {
    // data van het formulier ophalen
    // check de console voor de resultaten
    const $form = document.querySelector('.filter__form');
    const data = new FormData($form);
    const entries = [...data.entries()];
    console.log('entries:', entries);
    const qs = new URLSearchParams(entries).toString();
    console.log('querystring', qs);
    const url = `index.php?${qs}`;
    console.log('url', url);

    // request naar de server
    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });

    // opslaan van de protesten die de server heeft teruggeeven
    const protests = await response.json();

    updateList(protests);

    // aanpassen van de url en beschikbaar maken van de back button
    window.history.pushState(
      {},
      '',
      `${window.location.href.split('?')[0]}?${qs}`
    );
  }

  const updateList = protests => {
    const $protests = document.querySelector('.search__div');
    // elementen aanmaken via JavaScript ipv via PHP
    $protests.innerHTML = protests.map(protest => {
      return `
        <a href="index.php?page=detail&id=${protest.id}" class="section__protest">
          <section>
            <h3 class="section__protest--title">${protest.title}</h3>
            <p class="section__protest--description">
              ${protest.description}
            </p>
            <p class="section__protest--details">${protest.date}</p>
            <p class="section__protest--details">${protest.movement}, ${protest.flow}, ${protest.stretch}.</p>
          </section>
        </a>
      `;
    }).join(``);
  };

  // Zet de filter button op hidden tenzij javascript niet available is
  const hideButton = () => {
    const $filterbutton = document.getElementById('filter__button');
    $filterbutton.classList.add('hidden');
  }

  const init = () => {
    // class toevoegen om te decteren of JavaScript beschikbaar is of niet
    document.documentElement.classList.add('has-js');
    document.querySelectorAll('.filter__input').forEach($field => $field.addEventListener('input', handleInputField));
    hideButton();
  }

  init();
}
