<?php
class Article
{
    private $id, $title, $song_name, $category_id, $category_name, $brief, $content, $author_id, $author_name, $date, $image;

    public function __construct($id, $title, $song_name, $category_id, $category_name, $brief, $content, $author_id, $author_name, $date, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->song_name = $song_name;
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->brief = $brief;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->author_name = $author_name;
        $this->date = $date;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSongName()
    {
        return $this->song_name;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function getBrief()
    {
        return $this->brief;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function getAuthorName()
    {
        return $this->author_name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getImage()
    {
        return $this->image;
    }
}
