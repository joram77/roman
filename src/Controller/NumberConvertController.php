<?php

namespace App\Controller;

use App\Service\NumberConvertService;
use Romans\Filter\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NumberConvertController extends AbstractController
{
    /**
     * @Route("/", name="app_number_convert")
     * @param Request $request
     * @param NumberConvertService $service
     * @return Response
     */
    public function arabicToRoman(Request $request, NumberConvertService $service): Response
    {
        $number = (int)$request->get('number');
        $error = '';
        $roman = '';
        if ($request->query->has('number')) {
            if (!ctype_digit($request->get('number'))) {
                $error = 'You gave an invalid or negative input number.';
            } else if ($number === 0 || $number > NumberConvertService::MAX_NUMBER) {
                $error = 'You must give a number between 1 and ' . NumberConvertService::MAX_NUMBER . '.';
            } else {
                try {
                    $roman = $service->arabicToRoman($number);
                } catch (Exception $e) {
                    $error = 'Error converting given number.';
                }
            }
        }
        return $this->render('number_convert/index.html.twig', [
            'numberConvertService' => $service,
            'number' => $number,
            'roman' => $roman,
            'error' => $error
        ]);
    }
}
