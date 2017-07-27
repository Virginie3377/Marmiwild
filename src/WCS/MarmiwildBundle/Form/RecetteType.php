<?php

namespace WCS\MarmiwildBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('imageFile', FileType::class, array(
                'label'=>'Photos'
            ))
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Entrée' => 'entree',
                    'Plat' => 'plat',
                    'Dessert' => 'dessert'
                )
            ))
            ->add('ingredient')
            ->add('personne')
            ->add('temps')
            ->add('preparation')
            ->add('submit', SubmitType::class, array(
                'label'=> 'Enregistrer'
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WCS\MarmiwildBundle\Entity\Recette'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_marmiwildbundle_recette';
    }


}
