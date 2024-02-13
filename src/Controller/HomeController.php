<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Message;
use App\Form\Contact;
use App\Form\Type\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * home controller
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactForm = new Contact();
        $contactForm->setEmail('');
        $contactForm->setMessage('');
        $contactForm->setName('');
        $contactForm = $this->createForm(ContactType::class, $contactForm);
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted())
        {
            // a symfony practice azt javasolja, lehet ugyanaz az akció a feldolgozásra,
            // és a rendereléssel, én ezzel azért nem értek egyet teljesen, külön action-be tenném
            if ($contactForm->isValid())
            {
                $contactForm = $contactForm->getData();
                $messageRecord = new Message();
                $messageRecord->setEmail($contactForm->getEmail());
                $messageRecord->setName($contactForm->getName());
                $messageRecord->setMessage($contactForm->getMessage());
                $entityManager->persist($messageRecord);
                $entityManager->flush();
                $this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
            }
            else
            {
                $errorMsg = 'Hiba! Kérjük töltsd ki az összes mezőt!';
                foreach($contactForm->getErrors() as $error)
                {
                    /** @var $error FormError */
                    if ($error->getOrigin()->getName() === 'email')
                    {
                        $errorMsg = $error->getMessage();
                        break;
                    }
                }
                $this->addFlash('error', $errorMsg);
            }
            return $this->redirectToRoute('homepage');
        }
        return $this->render('home/index.html.twig', [
            'contactForm' => $contactForm,
            'admin_url' => $this->generateUrl('admin')
        ]);
    }
}