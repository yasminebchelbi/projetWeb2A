<?php
require "../config.php";

class ArticleController
{
    // Select all articles
    public function articleList()
    {
        $sql = "SELECT * FROM article";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Select one article by id
    public function getArticleById($id)
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            $article = $query->fetch();
            return $article;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    // Add a new article
    public function addArticle($article)
    {
        $sql = "INSERT INTO article (id, date, title, category, content)
        VALUES (NULL, :date, :title, :category, :content)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'date' => $article->getDate(),
                'title' => $article->getTitle(),
                'category' => $article->getCategory(),
                'content' => $article->getContent()
            ]);
            echo "Article inserted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Update an article
    public function updateArticle($article, $id)
    {
        $conn = config::getConnexion();  // Renamed $db to $conn for consistency
    
        $query = $conn->prepare(
            'UPDATE article SET 
                date = :date,
                title = :title,
                category = :category,
                content = :content
            WHERE id = :id'
        );
        try {
            $query->execute([
                'id' => $id,
                'date' => $article->getDate(),
                'title' => $article->getTitle(),
                'category' => $article->getCategory(),
                'content' => $article->getContent(),
            ]);
    
            // Check if any records were actually updated
            if ($query->rowCount() > 0) {
                echo $query->rowCount() . " record(s) UPDATED successfully <br>";
            } else {
                echo "No changes made to the article (content might be the same). <br>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    // Delete an article by id
    public function deleteArticle($id)
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            echo "Article deleted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
