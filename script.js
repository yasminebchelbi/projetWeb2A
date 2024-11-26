document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const nomInput = document.getElementById('nom');
    const emailInput = document.getElementById('email');
    const idCommandeInput = document.getElementById('idCommande');
    const contenuReclamationInput = document.getElementById('contenuReclamation');

    form.addEventListener('submit', (event) => {
        let isValid = true;

        // Vérification du nom
        if (nomInput.value.trim() === '') {
            alert("Le champ 'Nom' est obligatoire.");
            isValid = false;
        }

        // Vérification de l'email
        if (!validateEmail(emailInput.value)) {
            alert("Veuillez entrer une adresse email valide.");
            isValid = false;
        }

        // Vérification de l'ID commande
        if (idCommandeInput.value.trim() === '' || isNaN(idCommandeInput.value)) {
            alert("Veuillez entrer un ID commande valide.");
            isValid = false;
        }

        // Vérification du contenu de la réclamation
        if (contenuReclamationInput.value.trim().length < 10) {
            alert("Le contenu de la réclamation doit contenir au moins 10 caractères.");
            isValid = false;
        }

        // Si un champ est invalide, empêcher l'envoi du formulaire
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Fonction pour valider une adresse email
    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});
