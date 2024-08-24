<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class PDFController extends Controller
{
    public function generatePDF(PDF $pdf)
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = $pdf->loadView('pdf.usersPdf', $data);
        return $pdf->download('users-lists.pdf');
    }
}
