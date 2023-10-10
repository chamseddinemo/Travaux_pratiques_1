<!DOCTYPE html>
<html>
<head>
    <title>Validation du mot de passe</title>
</head>
<body>
    <h1>Validation du mot de passe</h1>
    <form action="validation_mot_de_passe.php" method="post">
        Mot de passe : <input type="password" name="mot_de_passe" required><br><br>
        <input type="submit" value="Valider">
        <?php
        function valider_mot_de_passe($mot_de_passe) {
            if (strlen($mot_de_passe) < 6 || strlen($mot_de_passe) > 10) {
                return "Erreur : Le mot de passe doit avoir entre 6 et 10 caractères.";
            }
        
            // Sel statique
            $salt_statique = "ABC1234@";
        
            // Concaténer le mot de passe avec le sel
            $mot_de_passe_concatene = $mot_de_passe . $salt_statique;
        
            // Chiffrer le mot de passe concaténé (ici, simple encodage en base64)
            $mot_de_passe_chiffre = base64_encode($mot_de_passe_concatene);
        
            $message = "Mot de passe validé avec succès!<br>";
            $message .= "Salt : " . $salt_statique . "<br>";
            $message .= "Mot de passe chiffré : " . $mot_de_passe_chiffre;
        
            echo $message;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mot_de_passe = $_POST["mot_de_passe"];
            valider_mot_de_passe($mot_de_passe);
        }
        ?>          
    </form>
    
</body>
</html>