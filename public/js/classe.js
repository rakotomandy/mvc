$(document).ready(function () {
  // ===============================
  // TABLE DES MATIÈRES AVEC COEFFICIENTS
  // ===============================
  const matières = [
    {
      id: 1,
      className: "Première A",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 2 }, // moins important que les lettres
        { matière: "PHYSIQUE", coeff: 1 },
        { matière: "INFORMATIQUE", coeff: 1 },
        { matière: "CHIMIE", coeff: 1 },
        { matière: "BIOLOGIE", coeff: 1 },
        { matière: "HISTOIRE", coeff: 3 }, // histoire et géo sont centraux en série A
        { matière: "GÉOGRAPHIE", coeff: 3 },
        { matière: "LANGUE FRANÇAISE", coeff: 4 }, // très important en A
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 2,
      className: "Terminale A",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 2 },
        { matière: "PHYSIQUE", coeff: 1 },
        { matière: "INFORMATIQUE", coeff: 1 },
        { matière: "CHIMIE", coeff: 1 },
        { matière: "BIOLOGIE", coeff: 1 },
        { matière: "HISTOIRE", coeff: 3 },
        { matière: "GÉOGRAPHIE", coeff: 3 },
        { matière: "LANGUE FRANÇAISE", coeff: 4 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 3,
      className: "Première D",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 3 }, // important mais pas autant qu'en C
        { matière: "PHYSIQUE", coeff: 2 },
        { matière: "INFORMATIQUE", coeff: 1 },
        { matière: "CHIMIE", coeff: 3 }, // sciences naturelles + chimie forts
        { matière: "BIOLOGIE", coeff: 4 }, // coefficient le plus élevé
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 2 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 4,
      className: "Terminale D",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 3 },
        { matière: "PHYSIQUE", coeff: 2 },
        { matière: "INFORMATIQUE", coeff: 1 },
        { matière: "CHIMIE", coeff: 3 },
        { matière: "BIOLOGIE", coeff: 4 },
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 2 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 5,
      className: "Première C",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 5 }, // série C = maths reine
        { matière: "PHYSIQUE", coeff: 4 },
        { matière: "INFORMATIQUE", coeff: 2 },
        { matière: "CHIMIE", coeff: 3 },
        { matière: "BIOLOGIE", coeff: 2 },
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 2 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 6,
      className: "Terminale C",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 5 },
        { matière: "PHYSIQUE", coeff: 4 },
        { matière: "INFORMATIQUE", coeff: 2 },
        { matière: "CHIMIE", coeff: 3 },
        { matière: "BIOLOGIE", coeff: 2 },
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 2 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 7,
      className: "Seconde A",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 2 },
        { matière: "PHYSIQUE", coeff: 1 },
        { matière: "CHIMIE", coeff: 1 },
        { matière: "BIOLOGIE", coeff: 1 },
        { matière: "HISTOIRE", coeff: 2 },
        { matière: "GÉOGRAPHIE", coeff: 2 },
        { matière: "LANGUE FRANÇAISE", coeff: 3 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 8,
      className: "Seconde C",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 4 },
        { matière: "PHYSIQUE", coeff: 3 },
        { matière: "CHIMIE", coeff: 2 },
        { matière: "BIOLOGIE", coeff: 2 },
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 2 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 9,
      className: "collège",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 3 },
        { matière: "SCIENCES", coeff: 2 },
        { matière: "HISTOIRE", coeff: 2 },
        { matière: "GÉOGRAPHIE", coeff: 2 },
        { matière: "LANGUE FRANÇAISE", coeff: 3 },
        { matière: "LANGUE ANGLAISE", coeff: 2 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 10,
      className: "primaire",
      matières: [
        { matière: "MATHEMATIQUES", coeff: 2 },
        { matière: "SCIENCES", coeff: 1 },
        { matière: "HISTOIRE", coeff: 1 },
        { matière: "GÉOGRAPHIE", coeff: 1 },
        { matière: "LANGUE FRANÇAISE", coeff: 3 },
        { matière: "LANGUE ANGLAISE", coeff: 1 },
        { matière: "SPORT", coeff: 1 },
      ],
    },
    {
      id: 11,
      className: "préscolaire",
      matières: [
        { matière: "JEUX EDUCATIFS", coeff: 1 },
        { matière: "CHANT", coeff: 1 },
        { matière: "DESSIN", coeff: 1 },
        { matière: "PSYCHOMOTRICITÉ", coeff: 1 },
      ],
    },
  ];

  // ===============================
  // LISTE DES CLASSES
  // ===============================
  const classe = [/* inchangé car bonne structure */];

  // Remplir la liste déroulante avec les classes
  matières.forEach((item) => {
    $("#classeSelect").append(
      `<option value="${item.className}">${item.className}</option>`
    );
  });

  // Quand une classe est sélectionnée, on affiche ses matières
  $("#classeSelect").on("change", function () {
    const selected = $(this).val(); // récupère la valeur du select
    const info = matières.find((m) => m.className === selected); // cherche la classe
    if (info) {
      let html = `<h3>${info.className}</h3><ul>`;
      // Parcourt toutes les matières de la classe sélectionnée
      info.matières.forEach((mat) => {
        html += `<li>${mat.matière} (Coefficient: ${mat.coeff})</li>`;
      });
      html += "</ul>";
      $("#classeInfo").html(html); // injecte dans la page

      // Envoi des infos au serveur via AJAX
      $.ajax({
        url: "http://localhost/mvc/Form/getClasse", // à modifier selon ton routeur
        method: "POST",
        dataType:"json",
        data: { className: info.className, matieres: info.matières },
        success: function (response) {
          console.log("Sent to server:", response);
        },
        error: function (xhr) {
          console.error("AJAX error:", xhr);
        },
      });
    } else {
      $("#classeInfo").html(""); // vide si pas trouvé
    }
  });
});
