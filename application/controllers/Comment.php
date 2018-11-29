<?php
class Comment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Comment_model', 'comment');
    }

    public function createComment()
    {
        $this->form_validation->set_rules('comment_text', 'Comment Text', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
        }
        else
        {
            // post values
            $username = $this->session->userdata('username');
            $comment_text = $this->input->post('comment_text');
            $recipe = $this->input->post('recipe');
            // set post values
            $this->comment->setUsername($username);
            $this->comment->setCommentText($comment_text);
            // insert values in database
            $this->comment->addComment($recipe);
            redirect(base_url().$recipe);
        }
    }
}
