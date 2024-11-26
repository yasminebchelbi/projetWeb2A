<form method="POST" action="../public/addReclamation.php">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

    <label for="idCommande">ID Commande :</label>
    <input type="number" id="idCommande" name="idCommande" placeholder="Entrez l'ID de la commande" required>

    <label for="typeCommande">Type de Commande :</label>
    <select id="typeCommande" name="typeCommande" required>
        <option value="Produit">Produit</option>
        <option value="Service">Service</option>
    </select>

    <label for="contenuReclamation">Contenu de la Réclamation :</label>
    <textarea id="contenuReclamation" name="contenuReclamation" rows="4" placeholder="Expliquez votre réclamation" required></textarea>

    <button type="submit">Soumettre la Réclamation</button>
</form>
