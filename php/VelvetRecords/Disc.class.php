<?php

    class Disc 
    {
        private $title;
        private $year;
        private $genre;
        private $artist_id;
        private $disc_id;
        private $label;
        private $price;
        private $picture;

        public function getTitle() 
        {
            return $this->title;          
        } 

        public function setTitle($title) 
        {
            $this->title = $title;
        }      

        public function getYear() 
        {
            return $this->year;          
        } 

        public function setYear($year) 
        {
            $this->year = $year;
        }      

        public function getGenre() 
        {
            return $this->genre;          
        } 

        public function setGenre($genre) 
        {
            $this->genre = $genre;
        }      

        public function getArtistId() 
        {
            return $this->artist_id;          
        } 

        public function setArtistId($artist_id) 
        {
            $this->artist_id = $artist_id;
        }      

        public function getDiscId() 
        {
            return $this->disc_id;          
        } 

        public function setDiscId($disc_id) 
        {
            $this->disc_id = $disc_id;
        }      

        public function getLabel() 
        {
            return $this->disc_label;          
        } 

        public function setLabel($label) 
        {
            $this->disc_label = $label;
        }      

        public function getPrice() 
        {
            return $this->disc_price;          
        } 

        public function setPrice($price) 
        {
            $this->disc_price = $price;
        }      

        public function getPicture() 
        {
            return $this->disc_picture;          
        } 

        public function setPicture($picture) 
        {
            $this->disc_picture = $picture;
        }      
    }