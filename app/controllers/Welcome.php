<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url_helper', 'html_helper', 'form', 'email_helper'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->content = 'pages/home';
        $this->layout();
    }

    function maintenance()
    {
        $this->output->set_status_header('503');
        $this->load->view('maintenance_view');
    }

    public function contactForm()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $return = array(
                'STATUS' => validation_errors(),
                'CLASS' => 'error'
            );
            echo json_encode($return);
        } else {
            $sql = "SELECT * FROM email_subscribers WHERE subscriber_email = '" . $this->input->post('email') . "'";
            $query = $this->db->query($sql);
            if (count($query->result()) >= 1) {
                $return = array(
                    'STATUS' => 'You\'re already signed up.',
                    'CLASS' => 'error'
                );
                echo json_encode($return);
            } else {
                $data = array(
                    'subscribed' => true,
                    'subscriber_email' => $this->input->post('email')
                );

                if ($this->db->insert('email_subscribers', $data)) {
                    $return = array(
                        'STATUS' => 'Welcome to the fight.',
                        'CLASS' => 'success'
                    );
                    $this->sendSignupEmail($this->input->post('email'));
                    echo json_encode($return);
                } else {
                    $return = array(
                        'STATUS' => 'Database error.  Please contact info@fightcompanions.com.',
                        'CLASS' => 'error'
                    );
                    echo json_encode($return);
                }
            }
        }
    }

    public function feedbackForm()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $return = array(
                'STATUS' => validation_errors(),
                'CLASS' => 'error',
                'ERROR_ARRAY' => $this->form_validation->error_array()
            );
            echo json_encode($return);
        } else {
            if ($sentMail = $this->sendContactEmail(
                    $this->input->post('email'),
                    $this->input->post('firstname'),
                    $this->input->post('lastname'),
                    $this->input->post('comment')
                ) == true
            ) {
                $return = array(
                    'STATUS' => 'Thank you and we will respond ASAP. Maybe.',
                    'CLASS' => 'success'
                );
                echo json_encode($return);
            } else {
                $return = array(
                    'STATUS' => 'Error Sending Mail.  Try Again Later.',
                    'CLASS' => 'error'
                );
                echo json_encode($return);
            }
        }
    }

    //custom callback to accept only alphabets and space input
    public function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $str)) {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function sendSignupEmail($email)
    {
        $emailConfig = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@fightcompanions.com',
            'smtp_pass' => 'Chalupa5!',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        ];

        $from = [
            'email' => 'info@fightcompanions.com',
            'name' => "Fight Companions"
        ];

        $subject = 'Welcome to Fight Companions';
        $message = 'Welcome to the fight.';
        $to = array($email);
        //  $message = 'Type your gmail message here'; // use this line to send text email.
        // load view file called "welcome_message" in to a $message variable as a html string.
        $this->load->library('email', $emailConfig);
        // Sometimes you have to set the new line character for better result
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($from['email'], $from['name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            show_error($this->email->print_debugger());
        } else {
            // Show success notification or other things here
//            echo 'Success to send email';
        }
    }

    public function sendContactEmail($from, $firstName, $lastName, $comment, $twitter = null, $facebook = null, $instagram = null)
    {

        $emailConfig = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@fightcompanions.com',
            'smtp_pass' => 'Chalupa5!',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        ];

        $fromEmail = [
            'email' => $from,
            'name' => $firstName . ' ' . $lastName
        ];

        $subject = 'Feedback / Contact Form Submission';
        $message = '<div class="email-info">
        <ul class="email-bullets">
        <li>Twitter: ' . $twitter . '</li>
        <li>Facebook: ' . $facebook . '</li>
        <li>Instagram: ' . $instagram . '</li>
        <li>First Name: ' . $firstName . '</li>
        <li>Last Name: ' . $lastName . '</li>
        <li>Email: ' . $from . '</li>
        <li>Comment: ' . $comment . '</li>
        </ul>
        </div>';
        $to = array('info@fightcompanions.com');
        //  $message = 'Type your gmail message here'; // use this line to send text email.
        // load view file called "welcome_message" in to a $message variable as a html string.
        $this->load->library('email', $emailConfig);
        // Sometimes you have to set the new line character for better result
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($fromEmail['email'], $fromEmail['name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            return false;
        } else {
            return true;
        }
    }
}
