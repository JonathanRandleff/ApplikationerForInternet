<?php
class Recipe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recipe_model', 'recipe');
    }
    public function view($page = 'meatballs')
    {
        if ( ! file_exists(APPPATH.'views/recipe/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['comment'] = $this->recipe->retrieveComment($page);
        $this->load->view('templates/header', $data);
        $this->load->view('recipe/'.$page, $data);
    }

    public function deleteComment() {
        // post values
        $id = $this->input->post('id');
        $page = $this->input->post('page');

        // insert values in database
        $this->recipe->deleteComment($page, $id);
        redirect(base_url().'recipe/view/'.$page);
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
            $this->recipe->setUsername($username);
            $this->recipe->setCommentText($comment_text);
            // insert values in database
            $this->recipe->addComment($recipe);
            redirect(base_url().'recipe/view/'.$recipe);
        }
    }
}
