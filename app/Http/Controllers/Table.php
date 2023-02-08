<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Table extends Controller
{
    public function show()
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                echo $i . 'x' . $j . '=' . $i * $j . '<br>';
            }
        }
    }
}
