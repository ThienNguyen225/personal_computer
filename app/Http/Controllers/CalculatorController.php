<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    const SUMMATION = '+';
    const SUBTRACTION = '-';
    const MULTIPLICATION = '*';
    const DIVISION = '/';

    public function index()
    {
        return view('index');
    }

    public function calculator(Request $request)
    {
        $firstNumber = $request->firstNumber;
        $theSecondNumber = $request->theSecondNumber;
        $calculation = $request->calculation;

        switch ($calculation) {
            case self::SUMMATION:
                $result = $firstNumber + $theSecondNumber;
                break;
            case self::SUBTRACTION:
                $result = $firstNumber - $theSecondNumber;
                break;
            case self::MULTIPLICATION:
                $result = $firstNumber * $theSecondNumber;
                break;
            default :
                try {
                    $result = NULL;
                    if ($theSecondNumber != 0) {
                        $result = $firstNumber / $theSecondNumber;
                        break;
                    }
                } catch (Exception $exception) {
                    $exception->getMessage();
                }
        }
        return view('display', compact('result'));
    }
}
