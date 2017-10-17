<?php

namespace TricksBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class TricksType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',  TextType::class, array('label' => 'Titre'))
            ->add('content',TextareaType::class, array('label' => 'Description du trick'))
            ->add('author', TextType::class, array('label' => 'nom de la photo'), array('label' => 'Nom de l\'auteur'))
            ->add('category', EntityType::class, array(
                'class' => 'TricksBundle\Entity\Category', 'choice_label' => 'name', 'label' => 'catégorie'))
            ->add('images',         CollectionType::class, array(
                'entry_type'    =>  ImageType::class,
                'allow_add'     =>  true,
                'allow_delete'  =>  true,
                'by_reference'  =>  false,
                'label'         =>  false,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TricksBundle\Entity\Tricks'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tricksbundle_tricks';
    }


}
