<?php

namespace App\Controllers;

class Proceso extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');

            return view('templates/header', $data)
                .view('proceso/index', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
