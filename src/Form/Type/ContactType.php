<?php
declare(strict_types=1);

namespace App\Form\Type;

use App\Form\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * contact type
 */
class ContactType extends AbstractType
{
    /**
     * configure options
     *
     * @param $resolver - resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

    /**
     * build form
     *
     * @param $builder - builder
     * @param $options - options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Neved',
                'error_bubbling' => true,
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail címed',
                'error_bubbling' => true,
                'required' => true
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Üzenet szövege',
                'error_bubbling' => true,
                'required' => true
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Küldés'
            ])
        ;
    }
}