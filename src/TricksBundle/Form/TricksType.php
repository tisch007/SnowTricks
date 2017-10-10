<?php

namespace TricksBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TricksType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',  TextType::class)
            ->add('content',TextareaType::class)
            ->add('author', TextType::class)
            ->add('category', EntityType::class, array(
                'class' => 'TricksBundle\Entity\Category', 'choice_label' => 'name'))
           /* ->add('video',  CollectionType::class, array(
                'entry_type'    =>  VideoType::class,
                'allow_add'     =>  true,
                'allow_delete'  =>  true,
                'by_reference'  =>  false,
                'label'         =>  "Vidéos Youtube",
            ))*/
          // ->add('image',ImageType::class)
            ->add('save',SubmitType::class);
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
