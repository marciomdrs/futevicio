<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
    private $data = array();
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
 
    public function index()
    {
        $this->load->library('facebook');
        $user = null;
        $user_profile = null;
 
        // See if there is a user from a cookie
        $user = $this->facebook->getUser();
 
        if ($user) {
          try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $this->facebook->api('/me');
          } catch (FacebookApiException $e) {
            show_error(print_r($e, TRUE), 500);
          }
        }
 
        $this->data['facebook'] = $this->facebook;
        $this->data['user'] = $user;
        $this->data['user_profile'] = $user_profile;
 
        $this->load->view('welcome_message', $this->data);
    }
 
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>
