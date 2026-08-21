<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller 
{
    public function index()
    {
        $_SESSION['student_access'] = true;


        $this->call->view('student/home');
    }

    public function profile()
    {
        $data['student'] = [
            'student_id' => '2024-00118', 
            'name'       => 'Karl Ezra R. Aceveda',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F3',
            'email'      => 'karlezraaceveda2@gmail.com',
            'skills'     => 'PHP, C#, HTML/CSS, MySQL',
            'hobbies'    => 'Programming, Gaming, Watching Movies',
        ];

        $this->call->view('student/profile', $data);
    }
}