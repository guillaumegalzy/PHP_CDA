<?php

    class DiscDAO extends DAO
    {
        function insert($dis) {
            // générer une requête insert à partir de l'objet $dis (représentant un objet de la classe Disc)
            // exécuter cette requête à partir de la propriété $db
            $requete = $this->db->prepare("INSERT INTO `disc` (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)");
            
            //Liaison des données SQL et PHP
            $requete->bindValue(":disc_title", $dis->getTitle(), PDO::PARAM_STR);
            $requete->bindValue(":disc_year", $dis->getYear(), PDO::PARAM_INT);
            $requete->bindValue(":disc_picture",$dis->getPicture(), PDO::PARAM_STR);
            $requete->bindValue(":disc_label", $dis->getLabel(), PDO::PARAM_STR);
            $requete->bindValue(":disc_genre", $dis->getGenre(), PDO::PARAM_STR);
            $requete->bindValue(":disc_price", $dis->getPrice());
            $requete->bindValue(":artist_id", $dis->getArtistId(), PDO::PARAM_INT);

            $requete->execute();
        }

        function update($dis) {
            // générer une requête update à partir de l'objet $dis (représentant un objet de la classe Disc)
            // exécuter cette requête à partir de la propriété $db
            $requete = $this->db->prepare("UPDATE disc SET disc_title = :disc_title, disc_year = :disc_year, disc_picture = :disc_picture, disc_label = :disc_label, disc_genre = :disc_genre, disc_price = :disc_price, artist_id = :artist_id WHERE disc_id = :disc_id");

            //Liaison des données SQL et PHP
            $requete->bindValue(":disc_title", $dis->getTitle(), PDO::PARAM_STR);
            $requete->bindValue(":disc_year", $dis->getYear(), PDO::PARAM_INT);
            $requete->bindValue(":disc_picture",$dis->getPicture(), PDO::PARAM_STR);
            $requete->bindValue(":disc_label", $dis->getLabel(), PDO::PARAM_STR);
            $requete->bindValue(":disc_genre", $dis->getGenre(), PDO::PARAM_STR);
            $requete->bindValue(":disc_price", $dis->getPrice());
            $requete->bindValue(":artist_id", $dis->getArtistId(), PDO::PARAM_INT);
            $requete->bindValue(":disc_id", $dis->getDiscId(), PDO::PARAM_INT);

            $requete->execute();
        }

        function delete($dis) {
            // générer une requête update à partir de l'objet $dis (représentant un objet de la classe Disc)
            // exécuter cette requête à partir de la propriété $db
            $requete = $this->db->prepare("DELETE FROM disc WHERE disc_id = (?)");
            $requete->execute(array($dis->getDiscId()));
        }

        function find($id) {
            // générer une requête select à partir d'un id défini
            // exécuter cette requête à partir de la propriété $db
            $requete = $this->db->prepare("SELECT * FROM disc WHERE disc_id = (?)");
            $requete->execute(array($id));
        }

        function liste() {
            // générer une list de tous les disque existant dans la DB
            // exécuter cette requête à partir de la propriété $db
            $requete = $this->db->prepare("SELECT * FROM disc");
            $requete->execute();
        }
    }

