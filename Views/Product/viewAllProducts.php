<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/header.php';
?>

<h1>Liste des produits :</h1>
<table class="table table-striped">
    <tr class="firstrow">
        <td>
            #
        </td>
        <td>
            Titre
        </td>
        <td>
            Auteur
        </td>
        <td>
            Date de publication
        </td>
        <td>
            Publié
        </td>
        <td>
            Contenu
        </td>
        <td>

        </td>
    </tr>

    <?php
    foreach ($product_list as $article) {
        ?>
        <tr>
            <td>
                <?php
                echo $article['id'];
                ?>
            </td>
            <td>
                <?php
                echo $article['titre'];
                ?>
            </td>
            <td>
                <?php
                echo $article['auteur'];
                ?>
            </td>
            <td>
                <?php
                echo $article['date_publication'];
                ?>
            </td>
            <td>
                <?php
                echo $article['is_published'];
                ?>
            </td>
            <td>
                <?php
                echo $article['contenu'];
                ?>
            </td>
            <td>
                <a href="article.php?id=<?php echo $article['id'] ?>">Voir l'article</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'php/Project_ecommerce/Views/footer.php';
?>