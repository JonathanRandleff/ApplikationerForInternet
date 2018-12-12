<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model {

    private $_comment_text;
    private $_username;

    public function setUsername($username)
    {
        $this->_username = $username;
    }
    public function setCommentText($comment_text)
    {
        $this->_comment_text = $comment_text;
    }


    public function deleteComment($recipe, $comment_id) {
        $this->db->select('username');
        $this->db->from($recipe.'_comment');
        $this->db->where('id', $comment_id);
        $this->db->limit(1);
        $username = $this->db->get()->row()->username;

        if ($username === $this->session->userdata('username')) {
            $this->db->delete($recipe.'_comment', array('id' => $comment_id));
        }
        else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }


    public function addComment($recipe)
    {
        $data = array(
            'username' => $this->_username,
            'comment_text' => $this->_comment_text,
        );
        $this->db->insert($recipe.'_comment', $data);
        return $this->db->insert_id();
    }

    public function retrieveComment($recipe){

        return $this->db->get($recipe.'_comment')->result();
    }
    public function retrieveRecipe () {
        $xml=simplexml_load_file(base_url()."assets/xml/cookbook.xml") or die("Error: Cannot create object");
        return $xml;
    }



}