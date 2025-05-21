// Gestion de la sticky navbar
let header = document.getElementById("header");
let formulaireContainer = document.getElementById("form-container");

// Fonction pour positionner le formulaire sous le header en temps réel
function ajusterPositionFormulaire() {
  if (!formulaireContainer) return;
  
  let headerRect = header.getBoundingClientRect(); // Position du header
  let headerBottom = headerRect.bottom + window.scrollY; // Position du bas du header

  // Applique la position du bas du header au formulaire
  formulaireContainer.style.top = `${headerBottom}px`;
}

// Observer la navbar pour voir si elle devient sticky
const observer = new IntersectionObserver(
  ([entry]) => {
    if (!entry.isIntersecting) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
    ajusterPositionFormulaire();
  },
  { threshold: 1 }
);
observer.observe(document.querySelector(".section_1"));

// Mise à jour de la position du formulaire lors du scroll
window.addEventListener("scroll", ajusterPositionFormulaire);
window.addEventListener("resize", ajusterPositionFormulaire);
window.addEventListener("DOMContentLoaded", ajusterPositionFormulaire);

/* // Ajustement des formulaires
window.addEventListener("resize", adjustFormPosition);
window.addEventListener("DOMContentLoaded", adjustFormPosition);

function adjustFormPosition() {
  let formContainer = document.getElementById("form-container");
  let section1 = document.getElementById("section_1");

  if (formContainer && section1) {
    if (window.innerWidth <= 600) {
      formContainer.style.top =
        section1.style.display === "none" ? "5%" : "12%";
    } else {
      formContainer.style.top = "20%";
    }
  }
} */

// Gestion du hamburger menu
const hamburgerMenu = document.getElementById("hamburger-menu");
const enteteMenu = document.getElementById("entete");

hamburgerMenu.addEventListener("click", function () {
  enteteMenu.classList.toggle("open-close");
});

document
  .getElementById("hamburger-menu_1")
  .addEventListener("click", function () {
    let entete = document.getElementById("entete");
    entete.classList.toggle("open-close");
  });

// Gestion des boutons Connexion et Inscription
const btnConnexion = document.getElementById("btn-login");
const btnInscription = document.getElementById("btn-register");
const formulaireConnexion = document.getElementById("login-form");
const formulaireInscription = document.getElementById("signup-form");
const formulaireForget = document.getElementById("reset-form");

function basculerFormulaire(formAffiche, ...formCaches) {
  if (!formAffiche || !formulaireContainer) return;

  formAffiche.style.display = "block";
  formCaches.forEach((form) => form && (form.style.display = "none"));
  formulaireContainer.style.display = "flex";

  ajusterPositionFormulaire(); // S'assure que le formulaire colle bien au header
}

btnConnexion?.addEventListener("click", () => {
  basculerFormulaire(formulaireConnexion, formulaireInscription, formulaireForget);
});

btnInscription?.addEventListener("click", () => {
  basculerFormulaire(formulaireInscription, formulaireConnexion, formulaireForget);
});

// Gestion des liens pour basculer entre les formulaires
document.querySelectorAll(".lien-inscription").forEach((lien) =>
  lien.addEventListener("click", (e) => {
    e.preventDefault();
    basculerFormulaire(formulaireInscription, formulaireConnexion, formulaireForget);
  })
);

document.querySelectorAll(".lien-connexion").forEach((lien) =>
  lien.addEventListener("click", (e) => {
    e.preventDefault();
    basculerFormulaire(formulaireConnexion, formulaireInscription, formulaireForget);
  })
);

document.querySelectorAll(".forget-pass").forEach((lien) =>
  lien.addEventListener("click", (e) => {
    e.preventDefault();
    basculerFormulaire(formulaireForget, formulaireConnexion, formulaireInscription);
  })
);

// Gestion du bouton retour
document.querySelectorAll(".backBack").forEach((Back) => {
  Back.addEventListener("click", (b) => {
    b.preventDefault();
    if (formulaireContainer) formulaireContainer.style.display = "none";
  });
});


// Fonction de validation des champs
function validateField(field) {
  if (!field) return;
  const value = field.value.trim();
  const id = field.id;
  let isValid = true;
  let errorMessage = "";

  // Validation du nom
  if (id === "nom") {
    isValid = value.length >= 3;
    errorMessage = isValid ? "" : "Au moins 3 caractères.";
  }

  // Validation email
  if (id.startsWith("email")) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    isValid = emailPattern.test(value);
    errorMessage = isValid ? "" : "L'email est invalide.";
  }

  // Validation des mots de passe (par étapes)
  if (id === "password_3" || id === "password_1") {
    if (value.length < 8) {
      errorMessage = "Au moins 8 caractères.";
    } else if (!/[A-Z]/.test(value)) {
      errorMessage = "Au moins majuscule.";
    } else if (!/[a-z]/.test(value)) {
      errorMessage = "Au moins une minuscule.";
    } else if (!/\d/.test(value)) {
      errorMessage = "Au moins un chiffre.";
    } else if (!/[!@#$%^&*]/.test(value)) {
      errorMessage =
        "au moins un caractère spécial.";
    } else {
      errorMessage = ""; // Mot de passe valide
    }
    isValid = errorMessage === ""; // Si pas d'erreur, c'est valide
  }

  // Vérification de la confirmation du mot de passe
  if (id === "confirm-password") {
    let passwordValue = document.getElementById("password_3").value.trim();
    isValid = value === passwordValue;
    errorMessage = isValid ? "" : "Les mots de passe ne correspondent pas.";
  }

  // Validation du nom de la boutique
  if (id === "shopname") {
    isValid = value.length >= 3;
    errorMessage = isValid
      ? ""
      : "Au moins 3 caractères.";
  }

  // Validation de la catégorie
  if (id === "categories") {
    isValid = value.length >= 3;
    errorMessage = isValid
      ? ""
      : "Au moins 3 caractères.";
  }

  // Ajout/Suppression des classes et affichage du message d'erreur
  field.classList.toggle("valid", isValid);
  field.classList.toggle("invalid", !isValid);

  let errorElement = document.getElementById(id + "-error");
  if (errorElement) {
    errorElement.textContent = errorMessage;
  }
}

// Activation de la validation en temps réel
document.addEventListener("input", (event) => {
  if (event.target.classList.contains("input")) {
    validateField(event.target);
  }
});

// Vérification complète lors de la soumission (uniquement pour les champs visibles)
document
  .getElementById("signup-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    let isValid = true;

    // Sélectionne tous les inputs dans le formulaire
    document.querySelectorAll("#signup-form input").forEach((input) => {
      // On ne valide que si l'input est visible
      if (input.offsetParent !== null) {
        validateField(input);
        if (input.classList.contains("invalid")) isValid = false;
      }
    });

    if (isValid) {
      this.submit(); // Soumettre le formulaire si tout est valide
    } else {
      alert("Veuillez corriger les erreurs dans le formulaire.");
    }
  });

// Fonction pour afficher/masquer le mot de passe
function togglePassword(fieldId) {
  let field = document.getElementById(fieldId);
  if (field.type === "password") {
    field.type = "text";
  } else {
    field.type = "password";
  }
}

// Fonction pour basculer l'affichage des champs pour "Vendeur" et rendre les champs obligatoires si besoin
function toggleVendorChamp() {
  const role = document.getElementById("role").value;
  const vendorChamp = document.getElementById("vendor-champ");
  const shopname = document.getElementById("shopname");
  const categories = document.getElementById("categories");

  // Si le rôle est "Vendeur"
  if (role === "Vendeur") {
    vendorChamp.classList.remove("hidden");
    // Rendre ces champs obligatoires
    shopname.required = true;
    categories.required = true;
  } else {
    // Si le rôle est "Acheteur", on cache ces champs et ils ne sont pas obligatoires
    vendorChamp.classList.add("hidden");
    shopname.required = false;
    categories.required = false;
  }
}

// Assurez-vous de charger la fonction au moment du chargement de la page
document.addEventListener("DOMContentLoaded", function () {
  toggleVendorChamp(); // Vérifie l'état du rôle au chargement de la page
});

document.addEventListener("DOMContentLoaded", function () {
  const disconnectBtn = document.getElementById("disconnect");

  if (disconnectBtn) {
      disconnectBtn.addEventListener("click", function () {
          window.location.href = "../../logout.php";
      });
  }
});



/* // Le bouton Retour
const backBack = document.querySelectorAll(".backBack");

function Retour(masqueConnexion) {
  if (masqueConnexion) {
    masqueConnexion.style.display = "none";
  }
}

document.querySelectorAll(".backBack").forEach((Back) => {
  Back.addEventListener("click", (b) => {
    b.preventDefault();
    Retour(formulaireContainer);
  });
}); */