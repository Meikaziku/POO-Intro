document.addEventListener("DOMContentLoaded", function () {
  const machineStatu = document.querySelector(".coffee-header__display");
  const insertDosette = document.querySelector(".coffee-header__button-one");
  const coulerCafe = document.querySelector(".coffee-medium__arm");
  const liquideCafe = document.querySelector(".coffee-medium__liquid");

  machineStatu.addEventListener("click", function () {
    sendAction("on_off");
  });

  insertDosette.addEventListener("click", function () {
    sendAction("insert_dosette");
  });

  coulerCafe.addEventListener("click", function () {
    sendAction("couler_cafe");
  });

  function on_off() {
    machineStatu.classList.toggle("active");
  }

  function dosette() {
    insertDosette.classList.add("pressed");
    setTimeout(() => {
      insertDosette.classList.remove("pressed");
    }, 300);
  }

  function cafeCoule() {
    liquideCafe.classList.toggle('animation-cafe');
    setTimeout(() => {
      liquideCafe.classList.toggle('animation-cafe');
    }, 3000);
  }

  // Fonction pour envoyer une action AJAX
  function sendAction(action) {
    // Créer l'objet FormData pour envoyer les données
    const formData = new FormData();
    formData.append("action", action);

    // Envoyer la requête AJAX
    fetch("./process/actions.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);

        // mettre une dosette
        if (data.methode === "insert_dosette" && data.success === true) {
          dosette();
        }
        // activer le voyant vert
        if (data.methode === "on_off") {
          on_off();
        }

        // faire couler le cafer
        if (data.methode === "couler_cafe" && data.success === true) {
          cafeCoule();
        }

      })
      .catch((error) => {
        console.error("Erreur:", error);
      });
  }
});
