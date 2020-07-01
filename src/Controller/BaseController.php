<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ramsey\Uuid\Uuid;

use App\Entity\Payment;

class BaseController extends AbstractController
{
    /**
     * @Route("/register", methods={"POST","GET"}, name="register")
     */
    public function register()
    {
        $request = Request::createFromGlobals();
        $content = $request->getContent();
        $json = json_decode($content);
        $sum = $json->{'sum'};
        $spec = $json->{'spec'};

        $uuid = Uuid::uuid4()->toString();

        $payment = new Payment();
        $payment->uuid = $uuid;
        $payment->sum = $sum;
        $payment->spec = $spec;

        $doct = $this->getDoctrine()->getManager();
        $doct->persist($payment);
        $doct->flush();

        return $this->redirect(sprintf('/payments/card/form/%s', $uuid));
    }

    /**
     * @Route("/payments/card/form/{sessionId}", methods={"GET","HEAD"}, name="cardForm")
     */
    public function cardForm($sessionId)
    {
        $payment = $this->getDoctrine() 
            ->getRepository('App:Payment') 
            ->findOneByUuid($sessionId);
        return $this->render('form.html.twig', [
            'sum' => $payment->sum, 'spec' => $payment->spec
        ]);
    }
}
