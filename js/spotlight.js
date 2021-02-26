{
  const $prevBtn = document.querySelector(`#prevBtn`);
  const $nextBtn = document.querySelector(`#nextBtn`);
  const rowsAmount = document.querySelectorAll(`.page-row`).length;
  var tabCounter = 0;

  const init = () => {
    todayDate();
    $prevBtn.addEventListener(`click`, previousTab);
    $nextBtn.addEventListener(`click`, nextTab);
  };

  $prevBtn.style.display = "none";

  const nextTab = () => {
    document.querySelector(`.row${tabCounter}`).style.display = `none`;
    document.querySelector(`#prevBtn`).style.display = "block";
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

  function autocomplete(inp, arr) {

    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;

    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
      var a, b, i, val = this.value;

      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false; }
      currentFocus = -1;

      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");

      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);

      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {

        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");

          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);

          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function (e) {

            /*insert the value for the autocomplete text field:*/
            inp.value = this.getElementsByTagName("input")[0].value;

            /*close the list of autocompleted values,
            (or any other open lists of autocompleted values:*/
            closeAllLists();
          });
          a.appendChild(b);
        }
      }
    });

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");

    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;

      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);

      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {

      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
      closeAllLists(e.target);
    });
  }

  /*Array met alle steden van Belgie & Nederland*/
  var countries = ["'s-Gravenbrakel", "'s-Hertogenbosch (Den Bosch)", "Aalst", "Aarlen", "Aarschot", "Aat", "Alkmaar", "Almelo", "Almere", "Alphen aan den Rijn", "Amersfoort", "Amstelveen", "Amsterdam", "Andenne", "Antoing", "Antwerpen", "Apeldoorn", "Appingedam", "Arnemuiden", "Arnhem", "Assen", "Aubange", "Baarn", "Bastenaken", "Beaumont", "Beauraing", "Bergen op Zoom", "Bergen", "Beringen", "Biddinghuizen", "Bilzen", "Binche", "Blankenberge", "Blokzijl", "Bolsward", "Borgloon", "Borgworm", "Bouillon", "Boxtel", "Breda", "Bredevoort", "Bree", "Brugge", "Brussel", "Bunschoten", "Buren", "Bussum", "Capelle aan den IJssel", "Charleroi", "Chimay", "Chiny", "Chièvres", "Châtelet", "Ciney", "Coevorden", "Couvin", "Culemborg", "Damme", "Deinze", "Delft", "Delfzijl", "Den Helder", "Dendermonde", "Deventer", "Diemen", "Dieren", "Diest", "Diksmuide", "Dilsen-Stokkem", "Dinant", "Doetinchem", "Dokkum", "Doornik", "Dordrecht", "Durbuy", "Echt", "Edam", "Ede", "Edingen", "Eeklo", "Eemnes", "Eindhoven", "Emmeloord", "Emmen", "Enkhuizen", "Enschede", "Enspijk", "Eupen", "Fleurus", "Florenville", "Fontaine-l'Evêque", "Fosses-la-Ville", "Franeker", "Geel", "Geertruidenberg", "Geldenaken", "Geldrop", "Geleen", "Gembloers", "Gendt", "Genemuiden", "Genepiën", "Genk", "Gennep", "Gent", "Geraardsbergen", "Gistel", "Goes", "Gorinchem", "Gouda", "Grave", "Groenlo", "Groningen", "Haarlem", "Hagestein", "Halen", "Halle", "Hamont-Achel", "Hannuit", "Harderwijk", "Harelbeke", "Harlingen", "Hasselt", "Hasselt", "Hattem", "Heerhugowaard", "Heerlen", "Helmond", "Hengelo", "Herentals", "Herk-de-Stad", "Herstal", "Herve", "Heukelum", "Heusden", "Hilversum", "Hindeloopen", "Hoei", "Hoofddorp", "Hoogeveen", "Hoogezand-Sappemeer", "Hoogstraten", "Hoorn", "Houffalize", "Houten", "Huissen", "Hulst", "IJlst", "IJsselstein", "Ieper", "Izegem", "Kampen", "Kerkrade", "Kessel", "Klundert", "Komen-Waasten", "Kortrijk", "La Louvière", "La Roche-en-Ardenne", "Landen", "Landgraaf", "Laren", "Le Rœulx", "Leerdam", "Leeuwarden", "Leiden", "Lelystad", "Lessen", "Leuven", "Leuze-en-Hainaut", "Lier", "Limburg", "Lo-Reninge", "Lokeren", "Lommel", "Luik", "Maaseik", "Maassluis", "Maastricht", "Malmedy", "Marche-en-Famenne", "Mechelen", "Medemblik", "Menen", "Meppel", "Mesen", "Middelburg", "Moeskroen", "Monnickendam", "Montfoort", "Montfort", "Mortsel", "Muiden", "Naarden", "Namen", "Neufchâteau", "Nieuwegein", "Nieuwpoort", "Nieuwstadt", "Nijkerk", "Nijmegen", "Nijvel", "Ninove", "Oldenzaal", "Oostende", "Oosterhout", "Oss", "Ottignies-Louvain-la-Neuve", "Oudenaarde", "Oudenburg", "Oudewater", "Peer", "Philippeville", "Poperinge", "Purmerend", "Péruwelz", "Ravenstein", "Rhenen", "Rijssen", "Rochefort", "Roermond", "Roeselare", "Ronse", "Roosendaal", "Rotterdam", "Saint-Ghislain", "Saint-Hubert", "Sankt Vith", "Schagen", "Scherpenheuvel-Zichem", "Schiedam", "Schin op Geul", "Seraing", "Sint-Niklaas", "Sint-Oedenrode", "Sint-Truiden", "Sittard", "Sloten", "Sluis", "Sneek", "Spa", "Spijkenisse", "Stadskanaal", "Stavelot", "Staverden", "Stavoren", "Steenwijk", "Stein", "Susteren", "Terneuzen", "The Hague (Den Haag)", "Thorn", "Thuin", "Tiel", "Tielt", "Tienen", "Tilburg", "Tongeren", "Torhout", "Tubeke", "Turnhout", "Ulft", "Utrecht", "Vaals", "Valkenburg", "Valkenswaard", "Veendam", "Veenendaal", "Veere", "Veldhoven", "Velsen", "Venlo", "Verviers", "Veurne", "Vianen", "Vilvoorde", "Virton", "Vlaardingen", "Vlissingen", "Volendam", "Vollenhove", "Voorburg", "Voorst", "Waalwijk", "Wageningen", "Walcourt", "Waregem", "Waver", "Weert", "Weesp", "Wervik", "Wezet", "Wijchen", "Wijk bij Duurstede", "Willemstad", "Winschoten", "Winterswijk", "Woerden", "Workum", "Woudrichem", "Zaanstad", "Zaltbommel", "Zeist", "Zevenaar", "Zierikzee", "Zinnik", "Zoetermeer", "Zottegem", "Zoutleeuw", "Zutphen", "Zwolle"]

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("myInput"), countries);

  function todayDate() {
    document.querySelector("#today").valueAsDate = new Date();
  }

  init();
}
